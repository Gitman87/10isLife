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
function magnify(selector, zoom = 2.5, lensSize = 80) {
  console.log("Maginfier refreshed");
  const container = document.querySelector(selector);
  if (!container) return;

  const img = container.querySelector("img");
  if (!img) return;

  // Safety check to ensure image dimensions are available
  if (!img.naturalWidth || !img.naturalHeight) {
    console.warn(
      "Original image not fully loaded. Magnifier will initialize on load."
    );
  }

  // 1. Setup Lens (Outer Circle)
  const lens = document.createElement("div");
  lens.style.cssText = `
    position:absolute;
    pointer-events:none;
    width:${lensSize * 2}px;
    height:${lensSize * 2}px;
    border:3px solid white;
    border-radius:50%;
    box-shadow:0 .8rem 3.2rem rgba(0,0,0,0.5);
    overflow:hidden;
    z-index:5;
    display:none;
    /* FIX: Centers the lens on the cursor position */
    transform: translate(-50%, -50%);
  `;
  container.appendChild(lens);

  // 2. Setup Zoomed Image (The Content inside the lens)
  const zoomImg = document.createElement("img"); // <--- This is the correct variable name
  zoomImg.src = img.src;
  zoomImg.style.cssText = `
    position:absolute;
    left:0;
    top:0;
    transform-origin:0 0;
    /* CRITICAL FIXES: Reset CSS rules that cause squishing/distortion */
    max-width: none !important;
    max-height: none !important;
    width: auto;
    height: auto;
    object-fit: initial !important;
  `;
  lens.appendChild(zoomImg);

  // --- Dimension Refresh Logic ---
  function refreshZoomDimensions() {
    const nativeWidth = img.naturalWidth;
    const nativeHeight = img.naturalHeight;

    if (nativeWidth && nativeHeight) {
      // Set the inner image to its full, native dimensions
      zoomImg.style.width = nativeWidth + "px";
      zoomImg.style.height = nativeHeight + "px";
    }
  }

  // Initial call (Wait for original image to load)
  if (img.complete && img.naturalWidth) {
    refreshZoomDimensions();
  } else {
    img.onload = refreshZoomDimensions;
  }

  // --- Mouse Movement Logic ---
  container.addEventListener("mousemove", (e) => {
    // 1. Get container dimensions and cursor position relative to the container
    const rect = container.getBoundingClientRect();
    const x = e.clientX - rect.left;
    const y = e.clientY - rect.top;

    // Safety check for boundary
    if (x < 0 || y < 0 || x > rect.width || y > rect.height) {
      lens.style.display = "none";
      return;
    }

    // 2. Position the lens center exactly at the cursor
    lens.style.display = "block";
    lens.style.left = x + "px";
    lens.style.top = y + "px";

    // 3. Coordinate Normalization: Map cursor pos (x, y) from rendered size to native size
    const px = (x / rect.width) * img.naturalWidth;
    const py = (y / rect.height) * img.naturalHeight;

    // 4. Calculate the translation to align the magnified content
    const tx = -(px * zoom) + lensSize;
    const ty = -(py * zoom) + lensSize;

    // 5. Apply zoom and translation to the inner image
    zoomImg.style.transform = `translate(${tx}px, ${ty}px) scale(${zoom})`;
  });

  // Hide when mouse leaves
  container.addEventListener("mouseleave", () => {
    lens.style.display = "none";
  });
}
