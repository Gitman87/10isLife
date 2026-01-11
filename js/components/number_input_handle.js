function numberInputHandle() {
  const numberInputs = document.querySelectorAll(
    ".number_input_wrapper-number_input"
  );
  numberInputs.forEach((item) => {
    item.addEventListener("click", (e) => {
      const wrapper = e.target.closest(".number_input_wrapper-number_input");
      const input = wrapper.querySelector(
        ".number_input_wrapper-number_input-input"
      );
      const min = input.getAttribute("min");
      const max = input.getAttribute("max");
      const step = Number(input.getAttribute("step") || 1);
      var value = Number(input.getAttribute("value") || 0);
      let number = wrapper.querySelector(
        ".number_input_wrapper-number_input-value_wrapper-value"
      );
      number.innerHTML = value;

      if (
        e.target.classList.contains(
          "number_input_wrapper-number_input-minus_button-minus"
        )
      ) {
        console.log("Minus clicked");
        if (min) {
          if (value > min && value - step >= min) {
            value -= step;
          }
        } else {
          value -= step;
        }
        number.innerHTML = value;
        input.value = value;
        input.setAttribute("value", value);
        console.log("inputs value attribute misuesd 1 is ", input.value);
      } else if (
        e.target.classList.contains(
          "number_input_wrapper-number_input-plus_button-plus"
        )
      ) {
        console.log("Plus clicked");
        if (max) {
          if (value < max && value + step <= max) {
            value += step;
          }
        } else {
          value += step;
        }
        number.innerHTML = value;
        input.setAttribute("value", value);
        console.log(
          "inputs value attribute plused  1 is ",
          Number(input.getAttribute("value"))
        );
      }
    });
  });
}
numberInputHandle();
