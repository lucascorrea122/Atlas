function createFeature(name, type) {
  var feature;
  var x;
  var y;

  if (checkDuplicateFeature(name) && name != "") {
    grafo.model.getModel().beginUpdate();
    try {
      switch (type) {
        case "mandatory":
          var vertex = grafo.model.insertVertex(
            grafo.model.getDefaultParent(),
            name,
            name,
            10,
            setY(),
            80,
            30,
            "mandatory"
          );
          feature = new Feature(vertex);
          grafo.addFeature(feature);
          break;
        case "optional":
          var vertex = grafo.model.insertVertex(
            grafo.model.getDefaultParent(),
            name,
            name,
            10,
            setY(),
            80,
            30,
            "optional"
          );
          var optional = grafo.model.insertVertex(
            vertex,
            vertex.value + "Optinal",
            "",
            0.5,
            0,
            7,
            7,
            "PortOptional"
          );
          optional.geometry.offset = new mxPoint(-5, 0);
          optional.geometry.relative = true;
          feature = new Feature(vertex);
          grafo.addFeature(feature);
          break;
        case "alternative":
          var vertex = grafo.model.insertVertex(
            grafo.model.getDefaultParent(),
            name,
            name,
            10,
            setY(),
            80,
            30,
            "alternative"
          );
          feature = new Feature(vertex);
          grafo.addFeature(feature);
          break;

        default:
      }
    } finally {
      grafo.model.getModel().endUpdate();
    }
    layout.execute(grafo.model.getDefaultParent());

    grafo.organizeGraph();
    document.getElementById("modalFeature").style.display = "none";
  } else {
    alert("Name Invalid or Duplicated!!");
  }
}

function convertVertexToFeature(vertices) {
  for (var i = 0; i < vertices.length; i++) {
    var feature = new Feature(vertices[i]);
    grafo.addFeature(feature);
  }
  for (var k = 0; k < vertices.length; k++) {
    if (vertices[k].edges != undefined) {
      for (var j = 0; j < vertices[k].edges.length; j++) {
        if (vertices[k].edges[j].source.value == vertices[k].value) {
          grafo
            .getFeaturesByVertex(vertices[k])
            .addChild(grafo.getFeaturesByVertex(vertices[k].edges[j].target));
        }
        if (vertices[k].edges[j].target.value == vertices[k].value) {
          grafo
            .getFeaturesByVertex(vertices[k])
            .addParent(grafo.getFeaturesByVertex(vertices[k].edges[j].source));
        }
      }
    }
  }
}

function createStyles() {
  var style = new Array();
  style[mxConstants.STYLE_FILLCOLOR] = "transparent";
  style[mxConstants.STYLE_STROKECOLOR] = "transparent";
  style[mxConstants.STYLE_FONTCOLOR] = "black";
  style[mxConstants.STYLE_FONTSIZE] = 15;
  style[mxConstants.STYLE_RESIZABLE] = false;
  grafo.model.stylesheet.putCellStyle("mandatory", style);
  grafo.model.stylesheet.putCellStyle("optional", style);
  grafo.model.stylesheet.putCellStyle("alternative", style);

  style = new Object();
  style[mxConstants.STYLE_FILLCOLOR] = "white";
  style[mxConstants.STYLE_STROKECOLOR] = "black";
  style[mxConstants.STYLE_FONTCOLOR] = "black";
  style[mxConstants.STYLE_RESIZABLE] = false;
  style[mxConstants.STYLE_SHAPE] = mxConstants.SHAPE_ELLIPSE;
  style[mxConstants.STYLE_PERIMETER] = mxPerimeter.EllipsePerimeter;
  grafo.model.getStylesheet().putCellStyle("PortOptional", style);
}

function checkDuplicateFeature(name) {
  var features = grafo.getAllFeatures();
  var result = true;
  for (var i = 0; i < features.length; i++) {
    if (features[i].name == name) {
      result = false;
    }
  }
  return result;
}

function popUpCreateFeature(type) {
  var txt;
  var person = prompt("Please enter the feature's name:");
  if (person == null || person == "") {
    txt = "User cancelled the prompt.";
  } else {
    txt = "Hello " + person + "! How are you today?";
    createFeature(person, type);
  }
}

function setY() {
  var noEdge = [];
  var features = grafo.model
    .getModel()
    .getChildVertices(grafo.model.getDefaultParent());
  for (var i = 0; i < features.length; i++) {
    if (features[i].edges == null) {
      noEdge.push(features[i]);
    }
  }
  if (
    grafo.model.getModel().getChildVertices(grafo.model.getDefaultParent())
      .length > 0
  ) {
    return 90 + rubberband.graph.view.graphBounds.height;
  } else {
    return 10 + rubberband.graph.view.graphBounds.height;
  }
}
