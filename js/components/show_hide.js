function showHide(element, show, hide, targetElementId) {
  const target = document.getElementById(targetElementId);
  console.log(target);
  if (element.innerText === show) {
    element.innerText = hide;
    target.style.display = "flex ";
  } else {
    element.innerText = show;
    target.style.display = "none ";
  }
}
