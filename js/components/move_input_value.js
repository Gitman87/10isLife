function inputMoveValue(formId, inputId, outputId) {
  console.log("Move input value started");
  const form = document.querySelector(formId);
  const input = form.querySelector(inputId);

  const output = form.querySelector(outputId);

  output.value = input.value;
  return true;
  // console.log("input value trasferred>input value is ", input.value);
}
