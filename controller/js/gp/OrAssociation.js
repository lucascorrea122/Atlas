function makeOrAssociation(feature) {
  var associ = [];
  if (feature.parent.length != 0) {
    for (var i = 0; i < grafo.listAssociations.length; i++) {
      if (
        grafo.listAssociations[i].source.value == feature.parent[0].name &&
        grafo.listAssociations[i].target.style == "or"
      ) {
        associ.push(grafo.listAssociations[i]);
      }
      if (
        grafo.listAssociations[i].id.indexOf("Link") != -1 &&
        associ.indexOf(grafo.listAssociations[i].source) != -1
      ) {
        grafo.model.getModel().remove(grafo.listAssociations[i]);
      }
    }
    if (associ.length > 1) {
      grafo.model.getModel().beginUpdate();

      try {
        eval(
          "OrAssoc" +
            feature.parent[0].value +
            "TO" +
            feature.name +
            " = grafo.model.insertEdge(grafo.model.getDefaultParent(), null, '', associ[0], associ[associ.length-1],'edgeStyle=roundedStyle;curved=1')"
        );
        eval(
          "OrAssoc" +
            feature.parent[0].value +
            "TO" +
            feature.name +
            ".setId(associ[0].id+'Link'+associ[associ.length-1].id)"
        );
        grafo.addAssociation(
          eval("OrAssoc" + feature.parent[0].value + "TO" + feature.name)
        );
        grafo.listAssociations = grafo.model
          .getModel()
          .getChildEdges(grafo.model.getDefaultParent());
      } finally {
        layout.execute(grafo.model.getDefaultParent());
        grafo.organizeGraph();
        grafo.model.getModel().endUpdate();
      }
    }
  }
}
