function breadcrumbsMove() {
  const breadcrumbsWrapper = document.querySelector(".breadcrumbs");
  const latencyDown = 120;
  const latencyUp = 200;

  let lastPosition = window.scrollY;
  document.addEventListener("DOMContentLoaded", () => {
    breadcrumbsWrapper.classList.remove("hidden_crumb");
  });
  let superPosition = window.scrollY;
  function scrolling() {
    const currentPosition = window.scrollY;
    // console.log("Current position is: ", currentPosition);
    // console.log("last position is: ", lastPosition);

    //   if (currentPosition > lastPosition && currentPosition > latency) {
    //     breadcrumbsWrapper.classList.add("hidden_crumb");
    //   } else if (currentPosition < lastPosition || currentPosition <= latency) {
    //     breadcrumbsWrapper.classList.remove("hidden_crumb");
    //   }
    //   lastPosition = currentPosition ;
    // }
    if (currentPosition > lastPosition && currentPosition > latencyDown) {
      breadcrumbsWrapper.classList.add("hidden_crumb");
      superPosition = currentPosition - latencyUp;
      console.log("superposition down  is: ", superPosition);
    } else if (currentPosition < lastPosition) {
      console.log("going up");

      if (superPosition < lastPosition) {
        console.log("Waiting");
      } else {
        console.log("Current position is: ", currentPosition);
        console.log("last position is: ", lastPosition);
        console.log("superposition is: ", superPosition);

        breadcrumbsWrapper.classList.remove("hidden_crumb");
      }
    }
    lastPosition = currentPosition;
  }

  window.addEventListener("scroll", () => {
    scrolling();
  });
}
breadcrumbsMove();
