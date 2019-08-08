function Constraint(vertex) {
    this.vertex = vertex;
    this.name = vertex.value;

}





Constraint.prototype.setVertex = function(vertex) {
    this.vertex = vertex;
};

Constraint.prototype.getVertex = function() {
    return this.vertex;
};


Constraint.prototype.setName = function(name) {
    this.name = name;
};


Constraint.prototype.getName = function() {
    return this.name;
};