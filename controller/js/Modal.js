function closePopUp(modal){
    modal.style.display = "none";
}

function showPopUp(modal) {
  layout.execute(grafo.model.getDefaultParent());

  grafo.organizeGraph();

  modal.style.display = "block";
}

window.onclick = function(event) {

    if (event.target == document.getElementById('modalAssociation')) {
        document.getElementById('modalAssociation').style.display = "none";
    }

    if (event.target == document.getElementById('modalFeature')) {
        document.getElementById('modalFeature').style.display = "none";
    }
    if (event.target == document.getElementById('modalConstraint')) {
        document.getElementById('modalConstraint').style.display = "none";
    }
}

function createLoadModalButtonClick() {
    var createLoadModal = document.getElementById("loadFileModal");
    createLoadModal.style.display = "block";
}



