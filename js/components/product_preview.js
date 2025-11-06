function productPreview() {
  const previewMainContainer = document.querySelector(".product_preview");
  const mainPreviewImage = previewMainContainer.querySelector(
    ".product_preview-preview-image"
  );

  const slideshowImages = previewMainContainer.querySelectorAll(
    ".product_preview-slideshow-list-slide-button-image"
  );
  slideshowImages.forEach((slide) => {
    slide.addEventListener("click", () => {
      console.log("clicked");
      mainPreviewImage.src = slide.src;
    });
  });
}
productPreview();
