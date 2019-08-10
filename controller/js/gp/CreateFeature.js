/**
 * Function: createFeature
 *
 * Creates a new Feature with the name and type assigned
 * in the tool interface. Checks whether the assigned name
 * is not duplicate or null, if it is not, checks via a Switch
 * its assigned type.
 *
 * Through the type assigned to a Feature, a rectangle is created
 * that represents the Feature <insertVertex>  and the symbol
 * representing the Feature type.
 *
 * @param name - String that defines the name of the feature
 * @param type - String tha defines the type of the feature
 */

function createFeature(name, type) {
  var feature, feature2;
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
            setWithFeature(name),
            30,
            "mandatory"
        );

          var mandatory = grafo.model.insertVertex(
            vertex,
            vertex.value + "Mandatory",
            "",
            0.5,
            0,
            7,
            7,
            "portMandatory"
          );
          mandatory.geometry.offset = new mxPoint(-5, -8);
          mandatory.geometry.relative = true;
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
              setWithFeature(name),
            30,
            "optional"
          );
          var optional = grafo.model.insertVertex(
            vertex,
            vertex.value + "Optinal",
            "",
            0.5,
            -2,
            7,
            7,
            "portOptional"
          );
          optional.geometry.offset = new mxPoint(-5, -8);
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
              setWithFeature(name),
            30,
            "alternative"
          );
          feature = new Feature(vertex);
          grafo.addFeature(feature);
          break;


        default:
      }
    } finally {
      console.log(feature.getVertex().geometry.width);
      console.log(feature.getVertex().geometry.height);

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
  style[mxConstants.STYLE_STROKECOLOR] = "black";
  style[mxConstants.STYLE_FONTCOLOR] = "black";
  style[mxConstants.STYLE_FONTSIZE] = 15;
  style[mxConstants.STYLE_RESIZABLE] = false;
  grafo.model.stylesheet.putCellStyle("mandatory", style);
  grafo.model.stylesheet.putCellStyle("optional", style);
  grafo.model.stylesheet.putCellStyle("alternative", style);


  style = new Object();
  style[mxConstants.STYLE_FILLCOLOR] = "black";
  style[mxConstants.STYLE_STROKECOLOR] = "black";
  style[mxConstants.STYLE_FONTCOLOR] = "black";
  style[mxConstants.STYLE_RESIZABLE] = false;
  style[mxConstants.STYLE_SHAPE] = mxConstants.SHAPE_ELLIPSE;
  style[mxConstants.STYLE_PERIMETER] = mxPerimeter.TrianglePerimeter;
  grafo.model.getStylesheet().putCellStyle("portMandatory", style);


  style = new Object();
  style[mxConstants.STYLE_FILLCOLOR] = "black";
  style[mxConstants.STYLE_STROKECOLOR] = "black";
  style[mxConstants.STYLE_FONTCOLOR] = "black";
  style[mxConstants.STYLE_RESIZABLE] = false;
  style[mxConstants.STYLE_SHAPE] = mxConstants.SHAPE_TRIANGLE;
  style[mxConstants.STYLE_PERIMETER] = mxPerimeter.TrianglePerimeter;
  grafo.model.getStylesheet().putCellStyle("triangle", style);



  style = new Object();
  style[mxConstants.STYLE_FILLCOLOR] = "white";
  style[mxConstants.STYLE_STROKECOLOR] = "black";
  style[mxConstants.STYLE_FONTCOLOR] = "black";
  style[mxConstants.STYLE_RESIZABLE] = false;
  style[mxConstants.STYLE_SHAPE] = mxConstants.SHAPE_ELLIPSE;
  style[mxConstants.STYLE_PERIMETER] = mxPerimeter.EllipsePerimeter;
  grafo.model.getStylesheet().putCellStyle("portOptional", style);


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




function draw() {
  var canvas = document.getElementById('canvas');
  if (canvas.getContext) {
    var ctx = canvas.getContext('2d');

    ctx.fillRect(25, 25, 100, 100);
    ctx.clearRect(45, 45, 60, 60);
    ctx.strokeRect(50, 50, 50, 50);

    feature = new Feature(ctx);
    grafo.addFeature(feature);
    grafo.organizeGraph();

  }
}



function setWithFeature(name) {
 var stringLength = name.length;
 var count = 10 * stringLength;
 return count;
}



