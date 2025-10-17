function openModal() {
  const modal = document.querySelector(".log_modal");
  modal.showModal();

  const activeTab = document.querySelector(".tab_nav-button:nth-child(2)");
  activeTab.style.borderBottom = " 0.5rem solid #002b5b";
  activeTab.style.color = "#002b5b";
}
function closeModal() {
  const modal = document.querySelector(".log_modal");

  modal.close();
}
function setStartForm(form) {
  const container = document.querySelector(".log_modal-wrapper");
  const register = container.querySelector(".register");
  const logging = container.querySelector(".logging");
  if (form === "logging") {
    logging.style.visibility = "visible";
    register.style.visibility = "collapse";
  } else {
    logging.style.visibility = "collapse";
    register.style.visibility = "visible";
  }
}
// openModal();
// closeModal();
