function updateTotalSum() {
  const container = document.querySelector(
    ".checkout_address_form-courier_data"
  );
  let totalCourierFee = container.querySelector(
    ".checkout_address_form-courier_data-is_abroad"
  );
  console.log("totalCourierFee is ", totalCourierFee.value);

  const passTotalSum = container.querySelector(
    ".checkout_address_form-courier_data-pass_total_sum"
  );
  const passedTotalSum = container.querySelector(
    ".checkout_address_form-courier_data-passed_total_sum"
  );
  console.log("passTotalSum is ", passTotalSum.value);
  const displayedTotalSum = document.querySelector(
    ".main_checkout-summary-details-sum strong"
  );
  totalCourierFee.addEventListener("change", () => {
    totalCourierFee = container.querySelector(
      ".checkout_address_form-courier_data-is_abroad"
    );
    let newSum =
      parseFloat(totalCourierFee.value) + parseFloat(passedTotalSum.value);
    passTotalSum.value = "";
    console.log("neSum is ", newSum);
    passTotalSum.value = newSum;
    displayedTotalSum.textContent = newSum;
    console.log("new total sum is ", passTotalSum.value);
  });
}
updateTotalSum();
