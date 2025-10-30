function validateLogging() {
  const form = document.querySelector(".log_form");
  const errorContainer = form.querySelector(".logging-error_output");
  form.addEventListener("submit", async (e) => {
    e.preventDefault();

    const response = await fetch(form.action, {
      method: form.method,
      body: formData,
    });
    console.log("response is ", response);
    if (!response.ok) {
      throw new Error("Błąd serwera.");
    }
  });
}
