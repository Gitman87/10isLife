function cartAnim() {
  const header = document.querySelector(".header");
  const basketBallNumber = header.querySelector(
    ".header-content-account-shopping-basket_link-number"
  );
  const basketImg = header.querySelector(
    ".header-content-account-shopping-basket_link-basket"
  );
  const addContainer = document.querySelector(
    ".dashboard-pulpit-add-availability"
  );
  const addButton = addContainer.querySelector(".standard_button");
  const ball = addContainer.querySelector(
    ".dashboard-pulpit-add-availability-ball"
  );

  addButton.addEventListener("click", () => {
    const cloneBall = document
      .querySelector(".dashboard-pulpit-add-availability-ball")
      .cloneNode();
    addContainer.prepend(cloneBall);
    cloneBall.style.visibility = "visible";
    cloneBall.style.marginLeft = "6rem";
    let { top: y2, left: x2 } = basketBallNumber.getBoundingClientRect();
    let { top: y1, left: x1 } = ball.getBoundingClientRect();
    Object.assign(cloneBall.style, {
      position: "fixed",
      marginLeft: "0rem",
      top: `${y1}px`,
      left: `${x1}px`,
      translate: `${x2 - x1}px ${y2 - y1}px`,
      transition: `all 1s ease-in-out`,
      zIndex: "1000",
    });
    cloneBall.offsetHeight;
    cloneBall.addEventListener("transitionstart", () => {
      basketBallNumber.classList.add("pop");
      basketImg.classList.add("wiggle");
      cloneBall.classList.add("spin");
      addButton.disabled = true;
      addButton.style.pointerEvents = "none";
    });
    setTimeout(() => {
      basketBallNumber.classList.remove("pop");
      addButton.style.pointerEvents = "auto";
      addButton.disabled = false;
    }, "2000");
    cloneBall.addEventListener("transitionend", () => {
      basketImg.classList.remove("wiggle");
      cloneBall.classList.remove("spin");
      cloneBall.remove();
    });
  });
}
cartAnim();
// inspired from https://dev.to/mynk-tmr/fly-to-cart-animation-with-pure-javascript-in-few-lines-552l
