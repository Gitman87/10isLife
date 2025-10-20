function togglePassword(element, show, hide, inputId) {
  const input = document.getElementById(inputId);
  if (input.type === "password") {
    element.innerText = hide;
    input.type = "text";
  } else if (input.type === "text") {
    element.innerText = show;
    input.type = "password";
  } else {
    console.warn("Wrong input type - need password");
  }
}
