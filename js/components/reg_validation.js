function valReg() {
  const form = document.querySelector(".register");
  //pre inputs + buttons
  const preMailInput = form.querySelector("#pre_mail");
  const preMailButton = form.querySelector("#pre_email_button");
  const prePasswordInput = form.querySelector("#pre_password");
  const prePasswordConfirmInput = form.querySelector("#pre_confirm_password");
  const prePasswordButton = form.querySelector("#pre_password_button");
  const preFirstNameInput = form.querySelector("#pre_first_name");
  const preLastNameInput = form.querySelector("#pre_last_name");
  const preNamebutton = form.querySelector("#pre_name_button");
  //summary inputs
  const firstNameInput = form.querySelector("#first_name");
  const lastNameInput = form.querySelector("#first_name");
  const emailInput = form.querySelector("#email");
  const passwordInput = form.querySelector("#password");
  //policy
  const policyInput = form.querySelector("#policy");

  let errorMessages = [];

  form.addEventListener("submit", (e) => {
    if (
      firstNameInput.value === "" ||
      lastNameInput.value === "" ||
      emailInput.value === "" ||
      passwordInput.value === ""
    ) {
      errorMessages.push("Pole nie może być puste");
    }
    if (errorMessages.length > 0) {
      e.preventDefault();
    }
  });
}
