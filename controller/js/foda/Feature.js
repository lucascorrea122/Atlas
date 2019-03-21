var FeatureType = {
  MANDATORY: "mandatory",
  OPTIONAL: "optional",
  ALTERNATIVE: "alternative",
};

function Feature(vertex) {

  this.vertex = vertex;
  this.name = vertex.value;
  this.type = vertex.style;
  this.children = [];
  this.parent = [];
};

Feature.prototype.setName = function(name) {
  this.name = name;
};

Feature.prototype.setType = function(type) {
  this.type = type;
};

Feature.prototype.getName = function() {
  return this.name;
};

Feature.prototype.getType = function() {
  return this.type;
};

Feature.prototype.setChildren = function(children) {
  this.children = children;
};

Feature.prototype.setParent = function(parent) {
  this.parent = parent;
};

Feature.prototype.getChildren = function() {
  return this.children;
};

Feature.prototype.getParent = function() {
  return this.parent;
};

Feature.prototype.addChild = function(feature) {
  this.children.push(feature);
};

Feature.prototype.addParent = function(feature) {
  this.parent.push(feature);
};

Feature.prototype.clearParent = function() {
  this.parent = [];
};

Feature.prototype.removeChild = function(feature) {
  if(this.children.length > 0) {
    this.children.splice(this.children.indexOf(feature), 1);
  }
};

Feature.prototype.setVertex = function(vertex) {
  this.vertex = vertex;
};

Feature.prototype.getVertex = function() {
  return this.vertex;
};
