function prodBrowser() {
  const browser = document.querySelector(".prod_browser");
  const sortInput = browser.querySelector(".prod_browser-nav-sorting-sort_by");
  const displayInput = browser.querySelector(
    ".prod_browser-nav-display-display_number"
  );
  const browserList = browser.querySelector(".prod_browser-list");
  const prevButton = browser.querySelector(".prod_browser-nav-left_button");
  const nextButton = browser.querySelector(".prod_browser-right_button");

  sortInput.addEventListener("change", () => {
    updateUrlParameter("sort_option", sortInput.value);
  });

  displayInput.addEventListener("change", () => {
    updateUrlParameter("limit", displayInput.value);
  });

  //pagination
  if (window.currentPage <= 1) {
    prevButton.disabled = true;
    prevButton.style.style = gray;
  } else {
    prevButton.addEventListener("click", () => {
      const newPage = window.currentPage - 1;
      updateUrlParameter("page", newPage);
    });
  }
  if (window.currentPage >= window.totalPages) {
    nextButton.disabled = true;
    nextButton.style.color = gray;
    nextButton.addEventListener("click", () => {
      const newPage = window.currentPage + 1;
      updateUrlParameter("page", newPage);
    });
  }
  function updateUrlParameter(key, value) {
    const url = new URL(window.location.href);
    url.searchParams.set(key, value);
    if (key === "limit" || key === "sort") {
      url.searchParams.set("page", 1);
    }
    window.location.href = url.toString();
  }
}
prodBrowser();
