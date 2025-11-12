function writeReview() {
  console.log("writeReview triggred");
  const form = document.querySelector(".opinions-write");
  const errorContainer = form.querySelector(".opinions-write-error_output");
  form.addEventListener("submit", async (e) => {
    e.preventDefault();
    const formData = new FormData(form);
    try {
      const response = await fetch(form.action, {
        method: form.method,
        body: formData,
      });
      // console.log("response is ", response);
      if (!response.ok) {
        throw new Error("Błąd serwera.");
      }
      const result = await response.json();
      if (result["success"]) {
        form.reset();
        errorContainer.innerHTML = "Recenzja została pomyślnie przesłana!";
        console.log("Recenzja OK");
        setTimeout(() => {
          errorContainer.innerHTML = "";
        }, 3000);
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
writeReview();
