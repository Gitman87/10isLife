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

      magnify(".product_preview-preview", 2, 80);
    });
  });
}
productPreview();
function magnify(selector, zoom = 2, lensSize = 80) {
  const container = document.querySelector(selector);
  const img = container.querySelector("img");

  if (!container.querySelector("#lens")) {
    const lens = document.createElement("div");
    lens.style.cssText = `
    position:absolute;
    pointer-events:none;
    width:${lensSize * 2}px;
    height:${lensSize * 2}px;
    border:.3rem solid #ffeadf;
    border-radius:50%;
    box-shadow:0rem 0rem 0.6rem 0.1rem #00000063;
    overflow:hidden;
    z-index:5;
    display:none;
    transform: translate(-50%, -50%);
  `;
    lens.id = "lens";
    container.appendChild(lens);
  }
  //preparing original image copie,this will  be scaled
  const copiedImage = document.createElement("img");
  copiedImage.src = img.src;
  copiedImage.style.cssText = `
    position:absolute;
    left:0;
    top:0;
    transform-origin:0 0;
    max-width: none !important;
    max-height: none !important;
    width: auto;
    height: auto;
    object-fit: initial !important;
  `;
  lens.appendChild(copiedImage);
  container.addEventListener("mousemove", (e) => {
    // get cursor position
    const rect = container.getBoundingClientRect();
    //relative ccordinates , not of the page
    const x = e.clientX - rect.left;
    const y = e.clientY - rect.top;
    //cover lens over the cursor
    lens.style.display = "block";
    lens.style.left = x + "px";
    lens.style.top = y + "px";
    //map cusros as it is on the original %
    const px = (x / rect.width) * img.naturalWidth;
    const py = (y / rect.height) * img.naturalHeight;
    // calculate transistion fromthe focal point
    const tx = -(px * zoom) + lensSize;
    const ty = -(py * zoom) + lensSize;
    copiedImage.style.transform = `translate(${tx}px, ${ty}px) scale(${zoom})`;
  });
  // when cursorleaves main container
  container.addEventListener("mouseleave", () => {
    lens.style.display = "none";
  });
}
magnify(".product_preview-preview", 2, 80);
