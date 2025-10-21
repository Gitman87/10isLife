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
  // activeTab.style.borderBottom = " 0.5rem solid #002b5b";
  activeTab.classList.remove("inactive");
  const inActiveTab = document.querySelector(".tab_nav-button:first-child");
  // inActiveTab.style.borderBottom = " 0.5rem solid #808080";
  inActiveTab.classList.add("inactive");
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
  console.log("In setStarForm loggin is : ", form);
  // const container = document.querySelector(".log_modal-wrapper");
  const register = document.querySelector(".register");
  const logging = document.querySelector(".logging");
  if (form === "logging") {
    console.log("setStartForm set on logging");
    logging.style.display = " flex";

    // register.style.visibility = "hidden";
    register.style.display = "none";
  } else {
    console.log("setStartForm set on nothing");

    logging.style.display = "none";

    register.style.display = "flex ";
  }
}
// openModal();
// closeModal()
