function adjustSizes() {
  var topBarIcons = document.getElementById("topBarIconGroup");
  var topBarIconsSmall = document.getElementById("topBarIconGroupSmall");
  var canvas = document.getElementById("graphContainer");
  var modelName = document.getElementById("modelName");
  var height = window.innerHeight;
  var width = window.innerWidth;

  canvasWidth = width - 90;
  canvasHeight = height - 95;

  canvas.style.width = canvasWidth + "px";
  canvas.style.height = canvasHeight + "px";

  //  center model name input text
  modelName.style.marginLeft = width / 2 - modelName.clientWidth / 2 + "px";

  if (width <= 600) {
    // topBarIcons.style.display = "block";
    topBarIcons.style.display = "none";
    topBarIconsSmall.style.display = "block";
  } else {
    topBarIcons.style.display = "block";
    topBarIconsSmall.style.display = "none";
  }
}

window.onresize = function() {
  adjustSizes();
  adjustTooltips();
};

adjustTooltips = function() {
  var tooltips = document.getElementsByClassName("tooltip");

  // center tooltip
  var width = window.innerWidth;
  var top;
  var left;

  // LeftBar Create Association
  top = 66 + 68 + 34 - tooltips[9].clientHeight / 2;
  tooltips[9].style.top = top + "px";

  // TopBar
  left = width - (6 * 57 + 57 / 2 + tooltips[0].clientHeight / 2);
  tooltips[0].style.left = left + "px";

  left = width - (5 * 57 + 57 / 2 + tooltips[0].clientHeight / 2);
  tooltips[1].style.left = left + "px";

  left = width - (4 * 57 + 57 / 2 + tooltips[0].clientHeight / 2);
  tooltips[2].style.left = left + "px";

  left = width - (3 * 57 + 57 / 2 + tooltips[0].clientHeight / 2);
  tooltips[3].style.left = left + "px";
};
