function prodBrowser() {
  const browser = document.querySelector(".prod_browser");
  const sortInput = browser.querySelector(".prod_browser-nav-sorting-sort_by");
  const displayInput = browser.querySelector(
    ".prod_browser-nav-display-display_number"
  );
  const browserList = browser.querySelector(".prod_browser-list");

  sortInput.addEventListener("change", () => {
    updateUrlParameter("sort_option", sortInput.value);
  });

  displayInput.addEventListener("change", () => {
    updateUrlParameter("limit", displayInput.value);
  });

  function updateUrlParameter(key, value) {
    const url = new URL(window.location.href);
    url.searchParams.set(key, value);
    url.searchParams.set("page", 1);
    window.location.href = url.toString();
  }
}
prodBrowser();
