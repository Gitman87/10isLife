function openModal() {
  const modal = document.querySelector(".log_modal");

  const regForm = modal.querySelector(".register");
  const regFormElements = regForm.children;
  //collapse all elements
  const regFormKeys = Object.keys(regFormElements);
  regFormKeys.forEach((key) => {
    const link = regFormElements[key];
    link.style.visibility = "collapse";
  });
  //show first element
  regForm.firstElementChild.style.visibility = "visible";
  modal.showModal();
  //set tabs start style
  const activeTab = document.querySelector(".tab_nav-button:nth-child(2)");
  activeTab.classList.remove("inactive");
  const inActiveTab = document.querySelector(".tab_nav-button:first-child");
  inActiveTab.classList.add("inactive");
  //set the deafult radio (sex) ccheck
  const manCheckBox = modal.querySelector("#man");
  const womanCheckBox = modal.querySelector("#woman");
  manCheckBox.checked = true;
  manCheckBox.value = "man";
  womanCheckBox.value = "woman";
  //set default value of tax-number to NULL
  const taxNumber = modal.querySelector("#tax_number");
  taxNumber.value = null;
  // disable some inputs from submitting
  // const emailInput = modal.querySelector("#pre_email");
  // emailInput.setAttribute[("disabled", "true")];
}
function closeModal() {
  const modal = document.querySelector(".log_modal");
  const regForm = modal.querySelector(".register");
  const logging = modal.querySelector(".logging");
  const regFormElements = regForm.children;
  const regFormKeys = Object.keys(regFormElements);
  regFormKeys.forEach((key) => {
    const link = regFormElements[key];
    link.style.visibility = "collapse";
  });
  regForm.reset();
  logging.reset();
  modal.close();
}

function setStartForm(form) {
  // const container = document.querySelector(".log_modal-wrapper");
  const register = document.querySelector(".register");
  const logging = document.querySelector(".logging");
  if (form === "logging") {
    logging.style.display = " flex";

    // register.style.visibility = "hidden";
    register.style.display = "none";
  } else {
    logging.style.display = "none";

    register.style.display = "flex ";
  }
}
// openModal();
// closeModal()
