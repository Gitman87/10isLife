const slideShow = document.querySelector(".slideshow");
const slideShowList = slideShow.querySelector(".slideshow-list");
const slides = slideShow.querySelectorAll(".slideshow-list li");
// console.log("first slide is ", slides[0]);
const leftNavButton = slideShow.querySelector(".slideshow-nav-left_button");
const rightNavButton = slideShow.querySelector(".slideshow-nav-right_button");
let slideShowListPosition = 0;
let marginLeft = -1;
// slideShowList.style.marginLeft = marginLeft + "rem";
let currentMargin = 36;
let numberOfSlides = slides.length;
slides[Math.abs(slideShowListPosition)].classList.toggle("inactive_slide");

// console.log("Number of slides is: ", numberOfSlides);
let slideWidth = 72;
//start on second slide (for better looks)
document.addEventListener("DOMContentLoaded", () => {
  moveSlideShowLeft();
});

function moveSlideShowLeft() {
  if (Math.abs(slideShowListPosition) < numberOfSlides - 1) {
    slideShowListPosition--;
    marginLeft = 36 + slideWidth * slideShowListPosition;
    slides[Math.abs(slideShowListPosition)].classList.toggle("inactive_slide");
    slides[Math.abs(slideShowListPosition) - 1].classList.toggle(
      "inactive_slide"
    );
    slideShowList.style.marginLeft = marginLeft + "rem";
  }
}
function moveSlideShowRight() {
  if (Math.abs(slideShowListPosition) > 0) {
    slideShowListPosition++;
    marginLeft = 36 + slideWidth * slideShowListPosition;
    slides[Math.abs(slideShowListPosition)].classList.toggle("inactive_slide");
    slides[Math.abs(slideShowListPosition) + 1].classList.toggle(
      "inactive_slide"
    );
    slideShowList.style.marginLeft = marginLeft + "rem";
  }
}
