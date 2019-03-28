function loadFile(graph) {

  if(confirm("Do you really want to import a XML file?\n All unsaved progress will be lost!") == true) {

    grafo.clearGraph();
    var file = document.getElementById("fileInput").files;
    if(file.length <= 0) {
      return false;
    }

    var fileReader = new FileReader();

    fileReader.onload = function(e) {
      var doc = mxUtils.parseXml(this.result);
      var codec = new mxCodec(doc);
      var elt = doc.documentElement.firstChild;
      var cells = [];
      while(elt != null) {
  cells.push(codec.decodeCell(elt));
grafo.model.refresh();

        elt = elt.nextSibling;

      }

var ports = [];
for (var i = 0; i < cells.length; i++) {
if (cells[i].style=='port') {
ports.push(cells[i]);
}else{

  grafo.model.addCell(cells[i]);

}
}

var edges=[];
      var vertices = [];
      for(var i = 0; i < cells.length; i++) {

        if(cells[i].isEdge()) {
          if(cells[i].id.indexOf("Link")==-1){
            edges.push(cells[i]);

          }




        }
        if(cells[i].isVertex()) {
          vertices.push(cells[i]);

        }

      }
      grafo.model.removeCells(grafo.model.getChildEdges(grafo.model.getDefaultParent()));

      convertVertexToFeature(vertices);
      for (var x = 0; x < edges.length; x++) {
        createAssociation(edges[x].source.value,edges[x].target.value);

      }
      layout.execute(grafo.model.getDefaultParent());

      grafo.organizeGraph();


    }

    fileReader.readAsText(file.item(0));

    var createLoadModal = document.getElementById("loadFileModal");
    createLoadModal.style.display = "none";

  }
  layout.execute(grafo.model.getDefaultParent());

  grafo.organizeGraph();

}
