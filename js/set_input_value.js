//this i s for checkout address form

function setInputValue(checkId, sourceInputId) {
  const checkInput = document.getElementById(checkId);
  const sourceInput = document.getElementById(sourceInputId);
  // checkInput. = sourceInput.value;
  checkInput.setAttribute("value", sourceInput.value);

  sourceInput.addEventListener("change", (e) => {
    console.log("Ustaw adres jako domowy checked : ", sourceInput.value);
    const newValue = e.currentTarget.value;

    console.log("new value is ", typeof newValue);
    checkInput.setAttribute("value", newValue);
  });
}

// setInputValue(checkId, sourceInputId);
// setInputValue("set_address_check", "select_country");
