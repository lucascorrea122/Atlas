function changeTypeFeature(vertex, type) {
  var temp = vertex[0];
  var edges = temp.edges;
  var sources = [];
  var targets = [];

  if (vertex[0].edges != undefined) {
    for (var i = 0; i < edges.length; i++) {
      sources.push(edges[i].source);
      targets.push(edges[i].target);
    }
    grafo.removeFeature(vertex);
    createFeature(temp.value, type);
    var featureTarget = grafo.getFeaturesById(temp.value);
    for (var k = 0; k < sources.length; k++) {
      createAssociation(sources[k].value, targets[k].value);
      if (featureTarget.type == "alternative") {
        makeAlternativeAssociation(featureTarget);
      }
    }
  } else {
    grafo.removeFeature(vertex);
    createFeature(temp.value, type);
  }
  layout.execute(grafo.model.getDefaultParent());
  grafo.organizeGraph();
}
