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
      if (!response.ok) {
        throw new Error("Błąd serwera.");
      }
      const result = await response.json();
      if (result["success"]) {
        errorContainer.innerHTML = "";
        if (result["redirect"] === "checkout.php") {
          form.reset();
          closeModal();
          window.location.href = result["redirect"];
        } else {
          form.reset();
          closeModal();
          window.location.reload();
        }
      } else {
        errorContainer.innerHTML = result["message"];
        // errorContainer.innerHTML = errorMessages.join("<br>");
      }
      // console.log("result is ", result);
    } catch (error) {
      console.error(error);
    }
  });
}
validateLogging();
