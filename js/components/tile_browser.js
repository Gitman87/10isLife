function test() {
  console.log("plik js dziala");
}
const tileBrowser = document.querySelector(".tile_browser");
const tileBrowserList = tileBrowser.querySelector(".tile_browser-list");
const tiles = tileBrowser.getElementsByClassName("tile");
// console.log("seventh tile is is ", tiles[6]);
console.log("Heeeellooo2");
console.log("tiles number: ", tiles);
// const leftNavButton = tileBrowser.querySelector(
//   ".tile_browser-head-nav-left_button"
// );
// const rightNavButton = tileBrowser.querySelector(
//   ".tile_browser-head-right_button"
// );
let tileBrowserListPosition = 0;
let marginTile = 0;
// tileBrowserList.style.marginLeft =marginTile+ "rem";
// let currentMargin = 0;
let numberOfTiles = tiles.length;
// slides[Math.abs(tileBrowserListPosition)].classList.toggle("inactive_slide");

// console.log("Number of slides is: ", numberOfSlides);
let tileWidth = 29;
function moveTileBrowserLeft() {
  console.log("moved left");
  console.log(numberOfTiles);
  if (Math.abs(tileBrowserListPosition) < numberOfTiles - 5) {
    console.log("Number of tile is", numberOfTiles);
    tileBrowserListPosition--;
    marginTile = tileWidth * tileBrowserListPosition;
    // slides[Math.abs(tileBrowserListPosition)].classList.toggle("inactive_slide");
    // slides[Math.abs(tileBrowserListPosition) - 1].classList.toggle(
    //   "inactive_slide"
    // );
    console.log("margin left in movetileBrowserLeft is: ", marginTile);
    tileBrowserList.style.marginLeft = marginTile + "rem";
    console.log("tileBrowser position is: ", tileBrowserListPosition);
  }
}
function moveTileBrowserRight() {
  console.log("moved right");
  if (Math.abs(tileBrowserListPosition) > 0) {
    tileBrowserListPosition++;
    marginTile = tileWidth * tileBrowserListPosition;
    // tileBrowserList[Math.abs(tileBrowserListPosition)].classList.toggle(
    //   "inactive_slide"
    // );
    // slides[Math.abs(tileBrowserListPosition) + 1].classList.toggle(
    //   "inactive_slide"
    // );
    console.log("margin left in movetileBrowserRight is: ", marginTile);
    tileBrowserList.style.marginLeft = marginTile + "rem";
    console.log("tileBrowser position is: ", tileBrowserListPosition);
  }
}
