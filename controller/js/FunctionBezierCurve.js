function makeBezierCurve() {
  mxEdgeStyle.MyStyle = function(state, source, target, points, result) {
    if (source != null && target != null) {
      var cont = grafo.model.getEdges(
        source.cell.source,
        grafo.model.getDefaultParent(),
        false,
        true,
        false,
        false
      );

      var pt = new mxPoint(source.getCenterX(), target.getCenterY());

      if (mxUtils.contains(source, pt.x, pt.y)) {
        if (cont.length > 2) {
          pt.y = source.y + source.height - 5;

          pt.x = target.x + (cont.length - 2) * 10;
        } else {
          pt.y = source.y + source.height;

          pt.x = target.x;
        }
      }

      result.push(pt);
    }
  };
}
