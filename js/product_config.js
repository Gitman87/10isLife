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
  const childrenData = prodDataJson["children"];
  const gripList = document.createElement("ul");
  gripList.classList.add("digit_balls");
  const lengthList = document.createElement("ul");
  lengthList.classList.add("digit_balls");
  lengthContainer.appendChild(lengthList);
  //containers for updating amount
  const addContainer = document.querySelector(".dashboard-pulpit-add");
  const quantitiyInput = addContainer.querySelector(
    ".dashboard-pulpit-add-amount-quantifier"
  );
  const availabilityContainer = addContainer.querySelector(
    ".dashboard-pulpit-add-availability-message"
  );
  const toBasketButton = addContainer.querySelector(".standard_button");
  if (prodDataJson["variant_type"] === "config") {
    toBasketButton.style.visibility = "hidden";
  } else {
    toBasketButton.style.visibility = "visible";
  }
  const stockQuantityInput = addContainer.querySelector(
    ".dashboard-pulpit-add-amount-stock_quantity_input"
  );
  //   ---------------gen balls for grip sieze, use force, Luke------------
  // make unique grip values
  const gripValues = [];
  const gripIds = [];
  gripSizeData.forEach((element) => {
    gripValues.push(element["value"]);
    gripIds.push(element["child_id"]);
  });
  const uniqueGripValues = gripValues.filter(
    (value, index, array) => array.indexOf(value) === index
  );
  //make grip balls
  const gripBuckets = new Map();
  for (let i = 0; i < uniqueGripValues.length; i++) {
    const value = uniqueGripValues[i];
    const id = "digit_ball_" + i;
    const name = "grip_size";
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
  //prepare lengths listeners
  const handleLengthSelection = (foundLengthObject) => {
    const foundChildObject = childrenData.find(
      (item) => item.product_id === foundLengthObject["child_id"]
    );

    if (!foundChildObject) {
      return;
    }
    const newQuantity = foundChildObject["quantity"];
    const thumbnailUrl = document.querySelector(
      ".dashboard-pulpit-add-availability-thumbnail_input"
    ).value;
    stockQuantityInput.value = newQuantity;
    quantitiyInput.value = "1";
    quantitiyInput.min = "1";
    quantitiyInput.max = newQuantity;
    if (newQuantity > 5) {
      availabilityContainer.textContent = "Produkt dostępny";
      availabilityContainer.classList.remove("error_text_color");
      availabilityContainer.classList.add("message_text_color");
      toBasketButton.style.visibility = "visible";
      const newOnClickString = `addProductToCart(makeCartItem(${foundChildObject["product_id"]},"${foundChildObject["name"]}",${foundChildObject["price"]},"${thumbnailUrl}",${newQuantity},${foundChildObject["parent_id"]}));updateBasketNumber('cart')`;
      toBasketButton.removeAttribute("onclick");
      toBasketButton.setAttribute("onclick", newOnClickString);
    } else if (newQuantity > 0) {
      availabilityContainer.textContent = "Uwaga! Zostało mniej niż 5 szt.";
      availabilityContainer.classList.remove("message_text_color");
      availabilityContainer.classList.add("error_text_color");
      toBasketButton.style.visibility = "visible";
      const newOnClickString = `addProductToCart(makeCartItem(${foundChildObject["product_id"]},"${foundChildObject["name"]}",${foundChildObject["price"]},"${thumbnailUrl}",${newQuantity},${foundChildObject["parent_id"]}));updateBasketNumber('cart')`;
      toBasketButton.removeAttribute("onclick");
      toBasketButton.setAttribute("onclick", newOnClickString);
    } else {
      availabilityContainer.textContent = "Produkt niedostępny";
      availabilityContainer.classList.remove("message_text_color");
      availabilityContainer.classList.add("error_text_color");
      toBasketButton.style.visibility = "hidden";
      quantitiyInput.max = "0";
    }
  };

  lengthList.addEventListener("click", (event) => {
    const clickedElement = event.target.closest(".item");
    if (!clickedElement) return;
    const radioInput = clickedElement.querySelector('input[type="radio"]');
    if (!radioInput) return;
    const childId = radioInput.dataset.childId;
    const foundLengthObject = lengthData.find(
      (item) => item.child_id == childId
    );
    if (foundLengthObject) {
      handleLengthSelection(foundLengthObject);
    }
  });

  [...gripList.children].forEach((gripBall) => {
    gripBall.addEventListener("click", () => {
      lengthList.innerHTML = "";
      let bucketId = gripBall.dataset.gripId;
      let gotBucket = gripBuckets.get(bucketId);
      for (let i = 0; i < gotBucket.lengthArray.length; i++) {
        const foundLengthObject = lengthData.find(
          (item) => item.child_id === gotBucket.lengthArray[i]
        );
        const value = foundLengthObject["value"];
        const id = "digit_ball_length_" + i;
        const name = "length";
        const listItem = document.createElement("li");
        listItem.classList.add("item");
        const radioInput = document.createElement("input");
        radioInput.setAttribute("type", "radio");
        radioInput.setAttribute("id", id);
        radioInput.classList.add("digit_balls-item-ball");
        radioInput.setAttribute("value", value);
        radioInput.setAttribute("name", name);
        radioInput.dataset.childId = foundLengthObject["child_id"];
        if (i === 0) {
          radioInput.checked = true;
        }
        listItem.appendChild(radioInput);
        const label = document.createElement("label");
        label.setAttribute("for", id);
        label.classList.add("digit_balls-item-label");
        label.textContent = value;
        listItem.appendChild(label);
        lengthList.append(listItem);
      }
    });
  });
  gripSizeContainer.appendChild(gripList);
  //make length balls
}
genBalls(prodDataJson);
