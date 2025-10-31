function validateLogging() {
  const form = document.querySelector(".logging");
  const errorContainer = form.querySelector(".logging-error_output");
  form.addEventListener("submit", async (e) => {
    e.preventDefault();
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
      const result = await response.json();
      if (result["success"]) {
        console.log("zalogowao");
        if (result["redirect"]) {
          window.location.href = result["redirect"];
          console.log("User should be redirected now");
        }
      } else {
        // let errorMessages = [];
        // const errorMessagesObject = result["message"];
        // for (const message in errorMessagesObject) {
        //   if (errorMessagesObject.hasOwnProperty(message)) {
        //     errorMessages.push(errorMessagesObject[message]);
        //   }
        // }
        errorContainer.innerHTML = result["message"];
        // errorContainer.innerHTML = errorMessages.join("<br>");
      }
      // console.log("result is ", result);
    } catch (error) {
      console.error(error);
    }
  });
}
