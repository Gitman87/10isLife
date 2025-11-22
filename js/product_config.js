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
  const lengthList = document.createElement("ul");
  lengthList.classList.add("digit_balls");
  lengthContainer.appendChild(lengthList);
  //   ---------------gen balls for grip sieze, use force, Luke------------
  // make unique grip values
  const gripValues = [];
  const gripIds = [];

  gripSizeData.forEach((element) => {
    gripValues.push(element["value"]);
    gripIds.push(element["child_id"]);
  });
  const uniqueGripIds = gripIds.filter(
    (value, index, array) => array.indexOf(value) === index
  );
  const uniqueGripValues = gripValues.filter(
    (value, index, array) => array.indexOf(value) === index
  );
  console.log("uniqueGripIds: ", uniqueGripIds);

  console.log("uniqueGripValues array is: ", uniqueGripValues);
  //make grip balls
  const gripBuckets = new Map();
  for (let i = 0; i < uniqueGripValues.length; i++) {
    const value = uniqueGripValues[i];
    const id = "digit_ball_" + i;
    const name = "digit_ball";
    const listItem = document.createElement("li");
    listItem.classList.add("item");
    listItem.setAttribute("data-grip-id", value);
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
    // add event listener which dispalys length baslls
    //make kinda hashmap
    const matchingGripVariants = gripSizeData.filter(
      (item) => item.value === value
    );
    const associatedChildIds = matchingGripVariants.map(
      (item) => item.child_id
    );
    const bucket = {
      id: id,
      value: value,
      lengthArray: associatedChildIds,
    };
    gripBuckets.set(value, bucket);
  }
  //add display length balls for each grip ball
  console.log("gripList length is: ", gripList.children[0]);
  [...gripList.children].forEach((gripBall) => {
    gripBall.addEventListener("click", () => {
      console.log("gripBall is: ", gripBall);
      lengthList.innerHTML = "";
      let bucketId = gripBall.dataset.gripId;
      let gotBucket = gripBuckets.get(bucketId);
      console.log("gotBucket  length array is is: ", gotBucket.lengthArray);
      console.log("gripbal dataset is: ", bucketId);
      console.log("gripbutects with id is :", gripBuckets.bucketId);
      for (let i = 0; i < gotBucket.lengthArray.length; i++) {
        const value = gotBucket.lengthArray[i];
        const id = "digit_ball_length_" + i;
        const name = "digit_ball_length";
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
        lengthList.append(listItem);
      }
    });
  });
  console.log("gripBuckets is: ", gripBuckets);

  gripSizeContainer.appendChild(gripList);
  //make length balls
}
genBalls(prodDataJson);
