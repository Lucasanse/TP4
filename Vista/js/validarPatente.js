document.addEventListener("DOMContentLoaded", () => {
  // Selecciona todos los inputs de patente (por clase)
  const patenteInputs = document.querySelectorAll(".patente");

  patenteInputs.forEach((patenteInput) => {
    const form = patenteInput.closest("form");
    const feedback = patenteInput.nextElementSibling;

    form.addEventListener("submit", (event) => {
      const patente = patenteInput.value.trim().toUpperCase();
      const regexPatente = /^([A-Z]{3}\s[0-9]{3}|[A-Z]{2}\s[0-9]{3}\s[A-Z]{2})$/;

      if (!regexPatente.test(patente)) {
        event.preventDefault();
        event.stopPropagation();

        patenteInput.classList.add("is-invalid");
        patenteInput.classList.remove("is-valid");
        feedback.textContent = "Ingrese una patente válida (Ej: ABC 123 o AB 123 CD).";
        feedback.style.display = "block";
      } else {
        patenteInput.classList.remove("is-invalid");
        patenteInput.classList.add("is-valid");
        feedback.style.display = "none";
      }

      form.classList.add("was-validated");
    });
  });
});
