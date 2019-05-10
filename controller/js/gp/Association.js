function createAssociation(feat1name, feat2name) {
  var features = grafo.getAllFeatures();
  var feat1;
  var feat2;
  var type;

  for (var i = 0; i < features.length; i++) {
    if (features[i].getName() == feat1name) {
      feat1 = features[i];
    }
    if (features[i].getName() == feat2name) {
      feat2 = features[i];
    }
  }
  if (feat1 != null && feat2 != null && feat1 != "" && feat2 != "") {

    grafo.model.getModel().beginUpdate();

    try {
      if (feat2.parent.length == 0) {
        feat1.addChild(feat2);
        feat2.addParent(feat1);

        eval(
          "Assoc" +
          feat1.getName() +
          "TO" +
<<<<<<< Updated upstream
          feat2.getName() +
          "= grafo.model.insertEdge(grafo.model.getDefaultParent(), null, '', feat1.vertex, feat2.vertex, 'sourcePort=s;targetPort=n')"
=======
          feat2.getName()+
            " = grafo.model.insertEdge(grafo.model.getDefaultParent(), null, '', feat1.vertex, feat2.vertex,'sourcePort=s;targetPort=n')"
>>>>>>> Stashed changes
        );


        eval(
          "Assoc" +
          feat1.getName() +
          "TO" +
          feat2.getName() +
          ".setId(feat1.vertex.value+'To'+feat2.vertex.value)"
        );
        grafo.addAssociation(
          eval("Assoc" + feat1.getName() + "TO" + feat2.getName())
        );
        if (feat2.type == "alternative") {
          makeAlternativeAssociation(feat2);
        }
      }

    } finally {
      grafo.sortEdges();
      layout.execute(grafo.model.getDefaultParent());
      grafo.organizeGraph();
      document.getElementById("modalAssociation").style.display = "none";
      grafo.model.getModel().endUpdate();
    }
  }
}
