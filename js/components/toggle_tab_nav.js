function setActive(element) {
  const tabNav = document.querySelector(".tab_nav");
  const tabNavButtons = tabNav.querySelectorAll(".tab_nav-button");

  tabNavButtons.forEach((button) => {
    // button.style.borderBottom = " 0.5rem solid #808080";
    button.classList.add("inactive");
  });
  // element.style.borderBottom = " 0.5rem solid #002b5b";
  // element.style.color = "#002b5b";
  element.classList.remove("inactive");

  //   console.log("Cliked button number is: ", element.dataset.tab_navButtonNumber);
}
