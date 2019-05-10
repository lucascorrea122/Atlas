function makeAlternativeAssociation(feature) {
  var associ = [];
  if (feature.parent.length != 0) {
    for (var i = 0; i < grafo.listAssociations.length; i++) {
      if (
        grafo.listAssociations[i].source.value == feature.parent[0].name &&
        grafo.listAssociations[i].target.style == "alternative"
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
        draw();
        eval(
          "AlterAssoc" +
            feature.parent[0].value +
            "TO" +
            feature.name +
             "= grafo.model.insertEdge(grafo.model.getDefaultParent(), null, '', associ[0], associ[associ.length-1],'edgeStyle=roundedStyle;curved=1;strokeColor=red;')"
        );
        eval(
          "AlterAssoc" +
            feature.parent[0].value +
            "TO" +
            feature.name +
            ".setId(associ[0].id+'Link'+associ[associ.length-1].id)"
        );
        grafo.addAssociation(
          eval("AlterAssoc" + feature.parent[0].value + "TO" + feature.name)
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



function draw() {
  var canvas = document.getElementById('canvas');
  if (canvas.getContext) {
    var ctx = canvas.getContext('2d');

    // Exemplo de curvas de Bézier quadráticas
    ctx.beginPath();
    ctx.moveTo(grafo.model.getDefaultParent(),grafo.model.getDefaultParent());
    ctx.lineTo(associ[0],associ[0]);
    ctx.lineTo( associ[associ.length-1], associ[associ.length-1]);
    ctx.fill();
  }
}
