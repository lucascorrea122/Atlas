function closePopUp(modal) {

    modal.style.display = "none";

}

function closeAndRemoveFeature(modal) {
    var list = grafo.getFeatureNames();
    closePopUp(modal);
    for (var i = 0; i < list.length; i++) {
        var div = document.getElementById("divFeatureID");
        div.parentNode.removeChild(div);

    }
    var constraint = document.getElementById("inputConstraint");
    constraint.setAttribute("value", '');



}

function showPopUp(modal) {
    layout.execute(grafo.model.getDefaultParent());

    grafo.organizeGraph();

    modal.style.display = "block";
}

window.onclick = function (event) {

    if (event.target == document.getElementById('modalAssociation')) {
        document.getElementById('modalAssociation').style.display = "none";
    }

    if (event.target == document.getElementById('modalFeature')) {
        document.getElementById('modalFeature').style.display = "none";
    }
    if (event.target == document.getElementById('modalConstraint')) {
        closeAndRemoveFeature(modalConstraint);
    }
}

function createLoadModalButtonClick() {
    var createLoadModal = document.getElementById("loadFileModal");
    createLoadModal.style.display = "block";
}



