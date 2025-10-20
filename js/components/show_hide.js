function showHide(element, show, hide, targetElementId) {
  console.log("show_hode started");
  const target = document.getElementById(targetElementId);
  console.log(target);
  if (element.innerText === show) {
    console.log("shpould show");
    element.innerText = hide;
    target.style.display = "flex ";
  } else {
    element.innerText = show;
    target.style.display = "none ";
  }
}
