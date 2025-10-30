document.addEventListener("DOMContentLoaded", () => {
  console.log("Timeout triggered");
  const counter = document.querySelector(".registered-para-counter");
  let countStartNumber = 4;
  const interval = 1000;
  const timeout = countStartNumber * interval;

  setInterval(() => {
    countStartNumber--;
    counter.innerText = countStartNumber;
  }, interval);
  setTimeout(() => {
    window.location.href = "index.php";
  }, timeout);
  // window.location.href = "index.php";
});
