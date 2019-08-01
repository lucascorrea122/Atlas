

function showDiv(id) {
    var x = document.getElementById(id);
    if (x.style.display === "block") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}




function setStorage(name) {
    localStorage = name;
}

function getStorafe() {
    return localStorage;
}


function myFunction(id) {
    var x = document.getElementById("loginUser");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}