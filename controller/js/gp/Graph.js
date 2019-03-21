function Graph(model) {
  this.model = model;
  this.listFeatures = [];
  this.listAssociations = [];
}

Graph.prototype.setModel = function (model) {
  this.model = model;
};

Graph.prototype.getModel = function () {
  return this.model;
};

Graph.prototype.getAllFeatures = function () {
  return this.listFeatures;
};

Graph.prototype.undoFunction = function () {
  undoManager.undo();
}

Graph.prototype.redoFunction = function () {
  undoManager.redo();

}

Graph.prototype.addFeature = function (feature) {
  if (feature != undefined) {
    this.listFeatures.push(feature);
    return true;
  } else {
  }
};

Graph.prototype.addAssociation = function (association) {
  this.listAssociations.push(association);
};

Graph.prototype.createAssociation = function (feat1name, feat2name) {
  createAssociation(feat1name, feat2name);
};

Graph.prototype.getFeaturesById = function (id) {
  var result;
  for (var i = 0; i < this.listFeatures.length; i++) {
    if (this.listFeatures[i].getName() == id) {
      result = this.listFeatures[i];
    }
  }
  return result;
};

Graph.prototype.getVertexByValue = function (value) {
  var result;
  var list = grafo.model
    .getModel()
    .getChildVertices(grafo.model.getDefaultParent());
  for (var i = 0; i < list.length; i++) {
    if (list[i].value == value) {
      result = list[i];
    }
  }
  return result;
};

Graph.prototype.getFeatureNames = function () {
  var result = [];
  for (var i = 0; i < this.listFeatures.length; i++) {
    result.push(this.listFeatures[i].name);
  }
  return result;
};

Graph.prototype.organizeGraph = function () {
  layout.useBoundingBox = false;
  layout.edgeRouting = false;
  layout.levelDistance = 50;
  layout.nodeDistance = 20;
  layout.groupPadding = 100;
  layout.visited = true;

  grafo.setSelectBoxParent();
  grafo.setSelectBoxChild();
};

Graph.prototype.removeFeature = function (feature) {
  this.removeAssociations(feature[0]);

  for (var i = 0; i < this.listFeatures.length; i++) {
    if (this.listFeatures[i].name == feature[0].value) {
      this.listFeatures.splice(
        this.listFeatures.indexOf(this.listFeatures[i]),
        1
      );
    }
  }
  grafo.model.removeCells(feature);
  grafo.organizeGraph();
};

Graph.prototype.removeAssociations = function (feature) {
  for (var i = 0; i < this.listAssociations.length; i++) {
    if (this.listAssociations[i].target == feature) {
      this.getFeaturesByVertex(this.listAssociations[i].source).removeChild(
        this.getFeaturesByVertex(this.listAssociations[i].target)
      );
      grafo.model.removeCells([this.listAssociations[i]]);
    }
    if (this.listAssociations[i].source == feature) {
      this.getFeaturesByVertex(this.listAssociations[i].target).clearParent();
      grafo.model.removeCells([this.listAssociations[i]]);
    }
  }
  grafo.listAssociations = grafo.model
    .getModel()
    .getChildEdges(grafo.model.getDefaultParent());
  if (feature.style == "alternative") {
    makeAlternativeAssociation(this.getFeaturesByVertex(feature));
  }
};

Graph.prototype.getFeaturesByVertex = function (vertex) {
  var result;
  for (var i = 0; i < this.listFeatures.length; i++) {
    if (this.listFeatures[i].vertex.id == vertex.id) {
      result = this.listFeatures[i];
    }
  }
  return result;
};

Graph.prototype.getNoParent = function () {
  var result = [];
  for (var i = 0; i < this.listFeatures.length; i++) {
    if (this.listFeatures[i].parent.length == 0) {
      result.push(this.listFeatures[i]);
    }
  }
  return result;
};

Graph.prototype.setSelectBoxChild = function () {
  var selectBox = document.getElementById("feature2id2");

  var selectParentNode = selectBox.parentNode;
  var newSelectObj = selectBox.cloneNode(false);
  selectParentNode.replaceChild(newSelectObj, selectBox);

  var featuresNoParent = grafo.getNoParent();
  for (var i = 0, l = featuresNoParent.length; i < l; i++) {
    if (
      document.getElementById("feature1id2").value !=
      featuresNoParent[i].name &&
      document.getElementById("feature1id2").value !=
      featuresNoParent[i].vertex.value
    ) {
      if (
        this.getFeaturesById(document.getElementById("feature1id2").value)
          .parent.length != 0
      ) {
        if (
          this.getFeaturesById(document.getElementById("feature1id2").value)
            .parent[0].name != featuresNoParent[i].vertex.value
        ) {
          newSelectObj.options.add(
            new Option(
              featuresNoParent[i].vertex.value,
              featuresNoParent[i].vertex.value
            )
          );
        }
      } else {
        newSelectObj.options.add(
          new Option(
            featuresNoParent[i].vertex.value,
            featuresNoParent[i].vertex.value
          )
        );
      }
    }
  }
};

Graph.prototype.setSelectBoxParent = function () {
  var selectBox = document.getElementById("feature1id2");

  var selectParentNode = selectBox.parentNode;
  var newSelectObj = selectBox.cloneNode(false); // Make a shallow copy
  selectParentNode.replaceChild(newSelectObj, selectBox);

  for (var i = 0, l = this.listFeatures.length; i < l; i++) {
    newSelectObj.options.add(
      new Option(
        this.listFeatures[i].vertex.value,
        this.listFeatures[i].vertex.value
      )
    );
  }
};

Graph.prototype.sortEdges = function () {
  var edges = grafo.model
    .getModel()
    .getChildEdges(grafo.model.getDefaultParent());
  var mandatories = [];
  var optionals = [];
  var alternatives = [];
  for (var i = 0; i < edges.length; i++) {
    switch (edges[i].target.style) {
      case "mandatory":
        mandatories.push(edges[i]);
        break;
      case "optional":
        optionals.push(edges[i]);
        break;
      case "alternative":
        alternatives.push(edges[i]);
        break;
      default:
    }
  }
  mandatories = mandatories.concat(optionals);
  mandatories = mandatories.concat(alternatives);
  grafo.model.addCells(mandatories, grafo.model.getDefaultParent());
};

Graph.prototype.renameFeature = function (cell) {
  var newName = prompt("Please enter your name:", cell.value);
  if (
    newName != null &&
    newName != "" &&
    !grafo.getFeatureNames().includes(newName)
  ) {
    var feature = grafo.getFeaturesByVertex(cell);
    feature.setName(newName);
    cell.setValue(newName);
    cell.setId(newName);
    grafo.model.addCell(cell);
  } else {
    alert("Duplicated Name!!");
  }
  if (newName == "") {
    alert("Name Invalid!!");
  }
};

Graph.prototype.getXml = function () {
  var encoder = new mxCodec();
  var modelName = document.getElementById("modelName").value;
  var node = encoder.encode(grafo.model.getModel());

  if (modelName == "" || modelName == undefined || modelName == null) {
    alert("Insert the model name!");
  } else {
    var text = mxUtils.getXml(node);
    downloadXml(modelName, text.substring(14, text.length - 15));
  }
};

Graph.prototype.clearGraph = function () {
  grafo.model.removeCells(
    grafo.model.getChildVertices(grafo.model.getDefaultParent())
  );
  grafo.model.removeCells(
    grafo.model.getChildEdges(grafo.model.getDefaultParent())
  );
  grafo.listFeatures = [];
  grafo.listAssociations = [];
};
