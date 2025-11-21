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
  const lengthData = prodDataJson["length_variants"];
  const list = document.createElement("ul");
  list.classList.add("digit_balls");
  //   ---------------gen balls for grip sieze, use force, Luke------------
  const gripValues = [];
  gripSizeData.forEach((element) => {
    gripValues.push(element["value"]);
  });
  const uniqueGripValues = gripValues.filter(
    (value, index, array) => array.indexOf(value) === index
  );
  console.log("uniqueGripValues array is: ", uniqueGripValues);
}
genBalls(prodDataJson);
