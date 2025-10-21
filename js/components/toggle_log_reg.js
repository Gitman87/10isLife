function toggleLogReg(element) {
  const container = document.querySelector(".log_modal-wrapper");
  const register = container.querySelector(".register");
  const logging = container.querySelector(".logging");
  // console.log(
  //   "dataset number of the lement is : ",
  //   element.dataset.tab_navButtonNumber
  // );

  if (element.dataset.tab_navButtonNumber == 0) {
    // register.style.visibility = "visible";
    register.style.display = "flex";

    logging.style.display = "none";
  } else {
    logging.style.display = " flex";
    // register.style.visibility = "collapse";
    register.style.display = "none";
  }
}
