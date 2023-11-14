window.onscroll = function () {
  toggleArrowVisibility(window.pageYOffset);
};

function toggleArrowVisibility(distanceScrolled) {
  if (distanceScrolled < 1000) {
    document.getElementById("back-to-top").style.visibility = "hidden";
  } else {
    document.getElementById("back-to-top").style.visibility = "visible";
  }
}

function scrollToTop() {
  window.pageYOffset = 0;
}
