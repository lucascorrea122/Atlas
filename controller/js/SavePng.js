function show() {
  grafo.model.fit();
  var bounds = grafo.model.getGraphBounds();
  mxUtils.show(grafo.model, null, bounds.x - rubberband.x, bounds.y - rubberband.y, rubberband.width, rubberband.height);

}
