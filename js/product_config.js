function prodConfig() {}
function genBalls(prodDataJson) {
  const variantsContainer = document.querySelector(
    ".dashboard-pulpit-variants"
  );
  const gripSizeContainer = variantsContainer.querySelector(
    ".dashboard-pulpit-variants-sizes"
  );
  const lengthContainer = variantsContainer.querySelector(
    ".dashboard-pulpit-variants-length"
  );
  const gripSizeData = prodDataJson["grip_variants"];
  console.log("Grip size are: ", gripSizeData);
  const lengthData = prodDataJson["length_variants"];
  console.log("Lengths are: ", lengthData);
  const childrenData = prodDataJson["children"];
  console.log("Children are: ", childrenData);
  const gripList = document.createElement("ul");
  gripList.classList.add("digit_balls");
  //   ---------------gen balls for grip sieze, use force, Luke------------
  // make unique grip values
  const gripValues = [];
  gripSizeData.forEach((element) => {
    gripValues.push(element["value"]);
  });
  const uniqueGripValues = gripValues.filter(
    (value, index, array) => array.indexOf(value) === index
  );
  //make grip balls
  for (let i = 0; i < uniqueGripValues.length; i++) {
    const value = uniqueGripValues[i];
    const id = "digit_ball_" + i;
    const name = "digit_ball";
    const listItem = document.createElement("li");
    listItem.classList.add("item");
    const radioInput = document.createElement("input");
    radioInput.setAttribute("type", "radio");
    radioInput.setAttribute("id", id);
    radioInput.classList.add("digit_balls-item-ball");
    radioInput.setAttribute("value", value);
    radioInput.setAttribute("name", name);
    listItem.appendChild(radioInput);
    //label
    const label = document.createElement("label");
    label.setAttribute("for", id);
    label.classList.add("digit_balls-item-label");
    label.textContent = value;
    listItem.appendChild(label);
    // radioInput.setAttribute("data-variant-id", variantId);
    gripList.appendChild(listItem);
  }
  // uniqueGripValues.forEach((ball) => {
  //   const value = ball;
  //   const listItem = document.createElement("li");
  //   listItem.classList.add("item");
  //   const radioInput = document.createElement("input");
  //   radioInput.setAttribute("type", "radio");
  //   radioInput.setAttribute("id", id);
  //   radioInput.classList.add("digit_balls-item-ball");
  //   radioInput.setAttribute("value", value);
  //   radioInput.setAttribute("data-variant-id", variantId);
  //   listItem.appendChild(radioInput);
  //   gripList.appendChild(listItem);
  // });
  gripSizeContainer.appendChild(gripList);
  //make length balls
  console.log("uniqueGripValues array is: ", uniqueGripValues);
  // make unique grip values
  const lengthValues = [];
  lengthData.forEach((element) => {
    lengthValues.push(element["value"]);
  });

  //create child object grip size an  length

  //show length for a given  grip size
  const map = new Map();
}
genBalls(prodDataJson);
