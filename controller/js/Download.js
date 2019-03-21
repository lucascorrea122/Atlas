function downloadXml(name, content) {
  var atag = document.createElement("a");
  var file = new Blob([content], {
    type: 'text/plain'
  });
  atag.href = URL.createObjectURL(file);
  atag.download = name + '.xml';
  atag.click();
}

function downloadPng(format) {

  alert("não implementado");


}
