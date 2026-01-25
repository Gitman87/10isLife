function isAbroad() {
  const selectCourierContainer = document.querySelector(
    ".checkout_address_form-courier_data"
  );
  const selectCourier = document.getElementById("select_courier");

  const selectCountryInput = document.getElementById("select_country");
  const messagePara = selectCourierContainer.querySelector(
    ".checkout_address_form-courier_data-fee_message"
  );
  const courierTotalFeeHiddenInput =
    document.getElementById("courier_total_fee");
  let courierTotalFee = 0;
  selectCourier.addEventListener("change", () => {
    const chosenCourier = selectCourier.value;
    const chosenCountry = selectCountryInput.value;
    if (chosenCountry != "poland") {
      const abroadFee = document.getElementById(chosenCourier).value;
      const selectedOption = selectCourier.options[selectCourier.selectedIndex];
      const selectedOptionFee = selectedOption.dataset.courierFee;
      courierTotalFee = parseFloat(abroadFee) + parseFloat(selectedOptionFee);
      courierTotalFeeHiddenInput.value = courierTotalFee;
      courierTotalFeeHiddenInput.dispatchEvent(new Event("change"));
      messagePara.innerHTML = `Dodatkowa opłata za wysyłkę za granicę: ${abroadFee} zł`;
    } else {
      const selectedOption = selectCourier.options[selectCourier.selectedIndex];
      const selectedOptionFee = selectedOption.dataset.courierFee;
      courierTotalFeeHiddenInput.value = selectedOptionFee;
      courierTotalFeeHiddenInput.dispatchEvent(new Event("change"));
      messagePara.innerHTML = "";
    }
  });
  selectCountryInput.addEventListener("change", () => {
    const chosenCourier = selectCourier.value;
    const chosenCountry = selectCountryInput.value;
    if (chosenCountry != "poland") {
      const abroadFee = document.getElementById(chosenCourier).value;
      const selectedOption = selectCourier.options[selectCourier.selectedIndex];
      const selectedOptionFee = selectedOption.dataset.courierFee;
      courierTotalFee = parseFloat(abroadFee) + parseFloat(selectedOptionFee);
      courierTotalFeeHiddenInput.value = courierTotalFee;
      courierTotalFeeHiddenInput.dispatchEvent(new Event("change"));
      messagePara.innerHTML = `Dodatkowa opłata za wysyłkę za granicę: ${abroadFee} zł`;
    } else {
      const selectedOption = selectCourier.options[selectCourier.selectedIndex];
      const selectedOptionFee = selectedOption.dataset.courierFee;
      courierTotalFeeHiddenInput.value = selectedOptionFee;
      courierTotalFeeHiddenInput.dispatchEvent(new Event("change"));
      messagePara.innerHTML = "";
    }
  });
}

isAbroad();
