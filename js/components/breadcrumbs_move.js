function breadcrumbsMove() {
  const breadcrumbsWrapper = document.querySelector(".breadcrumbs");
  if (!breadcrumbsWrapper) {
    return;
  }
  const latencyDown = 120;
  const latencyUp = 200;

  let lastPosition = window.scrollY;
  document.addEventListener("DOMContentLoaded", () => {
    breadcrumbsWrapper.classList.remove("hidden_crumb");
  });
  let superPosition = window.scrollY;
  function scrolling() {
    const currentPosition = window.scrollY;

    if (currentPosition > lastPosition && currentPosition > latencyDown) {
      breadcrumbsWrapper.classList.add("hidden_crumb");
      superPosition = currentPosition - latencyUp;
    } else if (currentPosition < lastPosition) {
      if (superPosition > lastPosition) {
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
function autoBreadcrumbs() {
  const header = document.querySelector(".header");
  const breadcrumbs = document.querySelector(".breadcrumbs");

  if (!header || !breadcrumbs) return;

  const headerHeight = header.offsetHeight;

  breadcrumbs.style.top = `${headerHeight}px`;
}

window.addEventListener("load", autoBreadcrumbs);

window.addEventListener("resize", autoBreadcrumbs);
