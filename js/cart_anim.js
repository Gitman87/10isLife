function cartAnim() {
  const header = document.querySelector(".header");
  const basketBallNumber = header.querySelector(
    ".header-content-account-shopping-basket_link-number"
  );
  const addContainer = document.querySelector(
    ".dashboard-pulpit-add-availability"
  );
  const addButton = addContainer.querySelector(".standard_button");
  const ball = addContainer.querySelector(
    ".dashboard-pulpit-add-availability-ball"
  );

  addButton.addEventListener("click", () => {
    console.log("Add to cart cliked");
    const cloneBall = document
      .querySelector(".dashboard-pulpit-add-availability-ball")
      .cloneNode();
    addContainer.prepend(cloneBall);
    cloneBall.style.visibility = "visible";
    let { top: y2, left: x2 } = basketBallNumber.getBoundingClientRect();
    let { top: y1, left: x1 } = ball.getBoundingClientRect();
    console.log("y1 and x2 are:", y1, x2);
    Object.assign(cloneBall.style, {
      position: "fixed",
      top: `${y1}px`,
      left: `${x1}px`,
      translate: `${x2 - x1}px ${y2 - y1}px`,
      transition: `all 1s ease-in-out`,
      zIndex: "1000",
    });
    cloneBall.offsetHeight;
    cloneBall.addEventListener("transitionstart", () => {
      basketBallNumber.classList.add("wiggle");
      addButton.disabled = true;
    });
    cloneBall.addEventListener("transitionend", () => {
      basketBallNumber.classList.remove("wiggle");
      cloneBall.remove();
      addButton.disabled = false;
      console.log("Attempting to re-enable button:", addButton);
    });
  });
}
cartAnim();

console.clear();

// let { top: y2, left: x2 } = basketBallNumber.getBoundingClientRect();
// let { top: y1, left: x1 } = ball.getBoundingClientRect();
// Object.assign(ball.style, {
//   position: "fixed",
//   translate: `${x2 - x1 + 20}px ${y2 - y1 - 50}px`,
//   transition: `all 1s ease-in-out`,
// });
// $on(clone, "transitionstart", () => {
//   ball.classList.add("wiggle");
// });
// $on(clone, "transitionend", () => {
//   ball.classList.remove("wiggle");
//   clone.remove();
// });
