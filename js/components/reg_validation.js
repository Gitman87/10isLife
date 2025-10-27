// -------------------------------------

function addClass(object, className) {
  object.classList.add(className);
}
function removeClass(object, className) {
  object.classList.remove(className);
}
function isEmpty(input, output) {
  if (!input.value) {
    output.innerText = "Pole nie może być puste";
    console.log("puste pole too ", input.id);
    addClass(input, "error_blinking");
    return false;
  } else {
    output.innerText = "";
    removeClass(input, "error_blinking");
    return true;
  }
}
function validateEmail(inputId, outputId) {
  const EMAIL_REGEX = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
  const emailInput = document.querySelector(inputId);
  console.log("input value is: ", emailInput.value);
  const errorOutput = document.querySelector(outputId);
  if (!isEmpty(emailInput, errorOutput)) {
    return false;
  } else if (!EMAIL_REGEX.test(emailInput.value)) {
    errorOutput.innerText =
      "Proszę podać właściwy format email (np.: nazwa@domena.com)";
    addClass(emailInput, "error_blinking");

    return false;
  } else {
    removeClass(emailInput, "error_blinking");
    errorOutput.innerText = "";
    return true;
  }
}
function validatePassword(inputId, confirmId = "", outputId) {
  const passwordInput = document.querySelector(inputId);
  const errorOutput = document.querySelector(outputId);
  const PASSWORD_REGEX =
    /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
  if (!isEmpty(passwordInput, errorOutput)) {
    return false;
  } else if (!PASSWORD_REGEX.test(passwordInput.value)) {
    errorOutput.innerText =
      "Hasło musi się składać z conajmniej: 8 znaków, 1 dużej litery, 1 cyfry, 1 ze znaków [@$!%*?&]. Nie może mieć mieć odstępów między znakami. ";
    addClass(passwordInput, "error_blinking");
    return false;
  }
  if (confirmId) {
    console.log("it does have confirm input");
    const confirmInput = document.querySelector(confirmId);
    if (!isEmpty(confirmInput, errorOutput)) {
      return false;
    } else if (!PASSWORD_REGEX.test(confirmInput.value)) {
      errorOutput.innerText =
        "Hasło musi się składać z conajmniej: 8 znaków, 1 dużej litery, 1 cyfry, 1 ze znaków [@$!%*?&]. Nie może mieć mieć odstępów między znakami. ";
      addClass(confirmInput, "error_blinking");
      return false;
    }
    if (!(passwordInput.value === confirmInput.value)) {
      errorOutput.innerText = "Oba hasła muszą być takie same.";
      addClass(passwordInput, "error_blinking");
      addClass(confirmInput, "error_blinking");
      return false;
    } else {
      removeClass(passwordInput, "error_blinking");
      removeClass(confirmInput, "error_blinking");
      errorOutput.innerText = "";
      // console.log("Cheinking poassword passed");
      return true;
    }
  } else {
    // console.log("First input was correct and there isno confirm input");
    removeClass(passwordInput, "error_blinking");
    errorOutput.innerText = "";
    return true;
  }
}
function validateName(firstNameInputId, lastNameInputId, errorOutputId) {
  const firstNameInput = document.querySelector(firstNameInputId);
  const lastNameInput = document.querySelector(lastNameInputId);
  const errorOutput = document.querySelector(errorOutputId);

  const NAME_PART_REGEX = /^\p{Lu}\p{Ll}+$/u;
  const LAST_NAME_REGEX = /^\p{Lu}\p{Ll}+(-\p{Lu}\p{Ll}+)?$/u;

  if (!isEmpty(firstNameInput, errorOutput)) {
    return false;
  } else if (!isEmpty(lastNameInput, errorOutput)) {
    return false;
  }
  if (!NAME_PART_REGEX.test(firstNameInput.value)) {
    errorOutput.innerText =
      "Podaj poprawną formę swojego imienia (np. Piotr, Łukasz, Anna)";
    addClass(firstNameInput, "error_blinking");
    return false;
  } else if (!LAST_NAME_REGEX.test(lastNameInput.value)) {
    errorOutput.innerText = "Podaj poprawną forme swojego nazwiska";
    addClass(lastNameInput, "error_blinking");
  } else {
    removeClass(firstNameInput, "error_blinking");
    removeClass(lastNameInput, "error_blinking");
    errorOutput.innerText = "";
    return true;
  }
}
function nipCheckSum(value) {
  const onlyDigitsNIP = value.replace(/-/g, "");
  console.log("trimmed nip is ", onlyDigitsNIP);
  const digitsArrayNIP = onlyDigitsNIP.split("");
  const lastDigitNIP = digitsArrayNIP[digitsArrayNIP.length - 1];
  console.log("Last NIP digit is ", lastDigitNIP);
  console.log("Arrayed nip is ", digitsArrayNIP);
  const weights = [6, 5, 7, 2, 3, 4, 5, 6, 7];
  const multipliedArray = [];
  for (let i = 0; i < weights.length; i++) {
    let multiplied = digitsArrayNIP[i] * weights[i];
    multipliedArray.push(multiplied);
  }
  console.log("Multiplied NIP array is ", multipliedArray);

  const sum = multipliedArray.reduceRight((acc, cur) => acc + cur, 0);
  console.log("sum of nio is ", sum);
  const reminder = sum % 11;
  console.log("NIp reminder is ", reminder);
  if (reminder == lastDigitNIP) {
    console.log("NIP is valid");
    return true;
  } else {
    console.log("NIP is invalid");

    return false;
  }
}
function checkTaxNumber(inputId, outputId) {
  const taxNumberInput = document.querySelector(inputId);
  const output = document.querySelector(outputId);
  const NIP_REGEX = /^\d{3}-\d{3}-\d{2}-\d{2}$/;
  if (taxNumberInput.value === "") {
    removeClass(taxNumberInput, "error_blinking");
    output.innerText = "";
    return true;
  } else if (!NIP_REGEX.test(taxNumberInput.value)) {
    addClass(taxNumberInput, "error_blinking");
    output.innerText =
      "Tylko polski NIP. Musi się składać z 10 cyfr, np 123-456-78-90";
    return false;
  } else if (!nipCheckSum(taxNumberInput.value)) {
    addClass(taxNumberInput, "error_blinking");
    output.innerText = "Podaj prawidłowy NIP. Zły checksum.";
    return false;
  } else {
    removeClass(taxNumberInput, "error_blinking");
    output.innerText = "";
    return true;
  }
}

function checkPolicy(inputId, outputId) {
  const checkInput = document.querySelector(inputId);
  const output = document.querySelector(outputId);
  if (checkInput.checked) {
    removeClass(checkInput, "error_blinking");
    output.innerText = "";
    return true;
  } else {
    addClass(checkInput, "error_blinking");
    output.innerText = "Musisz zaakceptować regulamin.";
    return false;
  }
}
function submitForm() {
  const form = document.querySelector(".register");
  const errorContainer = form.querySelector(".register-summary-inputs-output");
  form.addEventListener("submit", async (e) => {
    e.preventDefault();

    if (
      !validateEmail("#e_mail", ".register-summary-inputs-output") ||
      !validatePassword("#password", "", ".register-summary-inputs-output") ||
      !validateName(
        "#first_name",
        "#last_name",
        ".register-summary-inputs-output"
      ) ||
      !checkTaxNumber("#tax_number", ".register-summary-company-output") ||
      !checkPolicy("#policy", ".register-summary-policy-wrapper-output")
    ) {
      console.log("Submitting stopped,.input error ");
    } else {
      const formData = new FormData(form);
      try {
        const response = await fetch(form.action, {
          method: form.method,
          body: formData,
        });
        console.log("response is ", response);

        if (!response.ok) {
          throw new Error("Błąd serwera.");
        }
        // console.log("result 206 linijka");

        const result = await response.json();
        if (result["success"]) {
          console.log("zalogowao");
        } else {
          errorContainer.innerText = result["message"];
        }

        console.log("result is ", result);
      } catch (error) {
        console.error(error);
      }

      console.log("submitted!");
    }
  });
}
submitForm();
