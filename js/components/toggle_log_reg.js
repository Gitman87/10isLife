function toggleLogReg(element) {
  console.log("toggle_log_reg here!");
  const container = document.querySelector(".log_modal-wrapper");
  const register = container.querySelector(".register");
  const logging = container.querySelector(".logging");
  console.log(
    "dataset number of the lement is : ",
    element.dataset.tab_navButtonNumber
  );

  //start position
  console.log("toggl_log-reg engaged");
  logging.style.visibility = "visible";
  register.style.visibility = "collapse";

  if (element.dataset.tab_navButtonNumber == 0) {
    register.style.visibility = "visible";
    logging.style.visibility = "collapse";
    console.log("visibility of 1 changed");
  } else {
    logging.style.visibility = "visible";
    register.style.visibility = "collapse";
    console.log("visibility of 0 changed");
  }
}
