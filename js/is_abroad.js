function isAbroad() {
  const selectCourierContainer = document.querySelector(
    ".checkout_address_form-courier_data"
  );
  const selectCourier = document.getElementById("select_courier");
  console.log("select courier element is ", selectCourier);

  const selectCountryInput = document.getElementById("select_country");
  const messagePara = selectCourierContainer.querySelector(
    ".checkout_address_form-courier_data-fee_message"
  );
  const courierTotalFeeHiddenInput =
    document.getElementById("courier_total_fee");
  let courierTotalFee = 0;
  selectCourier.addEventListener("change", () => {
    const chosenCourier = selectCourier.value;
    console.log("chosen couurier is ", chosenCourier);
    const chosenCountry = selectCountryInput.value;
    console.log("chosen country is ", chosenCountry);
    if (chosenCountry != "poland") {
      const abroadFee = document.getElementById(chosenCourier).value;
      const selectedOption = selectCourier.options[selectCourier.selectedIndex];
      console.log("selected option is ", selectedOption);
      const selectedOptionFee = selectedOption.dataset.courierFee;
      console.log("fee is ", selectedOptionFee);
      courierTotalFee = parseFloat(abroadFee) + parseFloat(selectedOptionFee);
      console.log("courierTotalFee is ", courierTotalFee);
      courierTotalFeeHiddenInput.value = courierTotalFee;
      messagePara.innerHTML = `Dodatkowa opłata za wysyłkę za granicę: ${abroadFee} zł`;
    } else {
      const selectedOption = selectCourier.options[selectCourier.selectedIndex];
      console.log("selected option is : ", selectedOption);
      const selectedOptionFee = selectedOption.dataset.courierFee;
      courierTotalFeeHiddenInput.value = selectedOptionFee;
      messagePara.innerHTML = "";
    }
  });
  selectCountryInput.addEventListener("change", () => {
    const chosenCourier = selectCourier.value;
    console.log("chosen couurier is ", chosenCourier);
    const chosenCountry = selectCountryInput.value;
    console.log("chosen country is ", chosenCountry);

    if (chosenCountry != "poland") {
      const abroadFee = document.getElementById(chosenCourier).value;
      console.log(abroadFee);
      const selectedOption = selectCourier.options[selectCourier.selectedIndex];
      console.log("selected option is : ", selectedOption);
      const selectedOptionFee = selectedOption.dataset.courierFee;
      console.log(abroadFee);
      console.log("fee is ", selectedOptionFee);
      courierTotalFee = parseFloat(abroadFee) + parseFloat(selectedOptionFee);
      console.log("courierTotalFee is ", courierTotalFee);
      courierTotalFeeHiddenInput.value = courierTotalFee;
      messagePara.innerHTML = `Dodatkowa opłata za wysyłkę za granicę: ${abroadFee} zł`;
    } else {
      const selectedOption = selectCourier.options[selectCourier.selectedIndex];
      console.log("selected option is : ", selectedOption);
      const selectedOptionFee = selectedOption.dataset.courierFee;
      courierTotalFeeHiddenInput.value = selectedOptionFee;
      messagePara.innerHTML = "";
    }
  });
}

isAbroad();
