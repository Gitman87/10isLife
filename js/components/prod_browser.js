function prodBrowser(currentPage, totalPages) {
  const browser = document.querySelector(".prod_browser");
  const sortInput = browser.querySelector(".prod_browser-nav-sorting-sort_by");
  const displayInput = browser.querySelector(
    ".prod_browser-nav-display-display_number"
  );
  const browserList = browser.querySelector(".prod_browser-list");
  const prevButton = browser.querySelector(
    ".prod_browser-nav-button_wrapper-left_button"
  );
  const nextButton = browser.querySelector(
    ".prod_browser-nav-button_wrapper-right_button"
  );
  const countPrev = browser.querySelector(
    ".prod_browser-nav-button_wrapper-left_button-count_prev"
  );
  const countNext = browser.querySelector(
    ".prod_browser-nav-button_wrapper-left_button-count_next"
  );
  sortInput.addEventListener("change", () => {
    updateUrlParameter("sort_option", sortInput.value);
  });

  displayInput.addEventListener("change", () => {
    updateUrlParameter("limit", displayInput.value);
  });

  //pagination
  console.log("window.currentPage is: ", currentPage);
  if (currentPage <= 1) {
    prevButton.disabled = true;
    prevButton.style.opacity = "0.5";
  } else {
    prevButton.addEventListener("click", () => {
      const newPage = currentPage - 1;
      updateUrlParameter("page", newPage);
    });
  }
  if (currentPage >= totalPages) {
    nextButton.disabled = true;
    nextButton.style.opacity = "0.5";
  } else {
    nextButton.addEventListener("click", () => {
      const newPage = currentPage + 1;
      updateUrlParameter("page", newPage);
      console.log("next button cliked and newPage is: ", newPage);
    });
  }

  function updateUrlParameter(key, value) {
    const url = new URL(location.href);
    url.searchParams.set(key, value);
    if (key === "limit" || key === "sort") {
      url.searchParams.set("page", 1);
    }
    location.href = url.toString();
  }
}
prodBrowser(currentPage, totalPages);
