function test() {
  console.log("plik js dziala");
}
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
function moveSlideShowLeft() {
  if (Math.abs(slideShowListPosition) < numberOfSlides - 1) {
    console.log("moved left");
    slideShowListPosition--;
    marginLeft = 36 + slideWidth * slideShowListPosition;
    slides[Math.abs(slideShowListPosition)].classList.toggle("inactive_slide");
    slides[Math.abs(slideShowListPosition) - 1].classList.toggle(
      "inactive_slide"
    );
    console.log("margin left in moveSlideShowLeft is: ", marginLeft);
    slideShowList.style.marginLeft = marginLeft + "rem";
    console.log("slideShow position is: ", slideShowListPosition);
  }
}
function moveSlideShowRight() {
  if (Math.abs(slideShowListPosition) > 0) {
    console.log("moved right");
    slideShowListPosition++;
    marginLeft = 36 + slideWidth * slideShowListPosition;
    slides[Math.abs(slideShowListPosition)].classList.toggle("inactive_slide");
    slides[Math.abs(slideShowListPosition) + 1].classList.toggle(
      "inactive_slide"
    );
    console.log("margin left in moveSlideShowRight is: ", marginLeft);
    slideShowList.style.marginLeft = marginLeft + "rem";
    console.log("slideShow position is: ", slideShowListPosition);
  }
}
