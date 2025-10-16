function setActive(element) {
  const tabNav = document.querySelector(".tab_nav");
  const tabNavButtons = tabNav.querySelectorAll(".tab_nav-button");
  //   console.log("Clicked number is: ", );
  //   const clickedButton = tabNav.querySelector(
  //     `[data-tab_nav-button-number]="${i}"`
  //   );
  element.classList.add("tab_nav_active");
  console.log("Cout of buttons is: ", tabNavButtons);
  tabNavButtons.forEach((button) => {
    console.log("changed to gray");
    button.style.borderBottom = " 0.5rem solid #808080";
    button.style.color = "#808080";
  });
  element.style.borderBottom = " 0.5rem solid #002b5b";
  element.style.color = "#002b5b";

  console.log("Cliked button number is: ", element.dataset.tab_navButtonNumber);
}
