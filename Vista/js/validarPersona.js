const form = document.querySelector("form");

form.addEventListener("submit", (event) => {
  // Cancela el envío si los datos no son válidos
  if (!form.checkValidity()) {
    event.preventDefault();
    event.stopPropagation();
  }

  // Validar DNI
  const dniInput = form.querySelector(".dni");
  if (dniInput) {
    if (!/^\d{7,9}$/.test(dniInput.value)) {
      event.preventDefault();
      event.stopPropagation();
      dniInput.classList.add("is-invalid");
      dniInput.classList.remove("is-valid");
      dniInput.nextElementSibling.textContent =
        "Ingrese un DNI válido (entre 7 y 9 números)";
    } else {
      dniInput.classList.remove("is-invalid");
      dniInput.classList.add("is-valid");
    }
  }

  // Validar Teléfono (todos números sin espacios y solo con + -)
    const telInput = form.querySelector("#telefono");
    if (telInput && !/^[0-9\-+]{1,}$/i.test(telInput.value)) {
      valido = false;
      telInput.classList.add("is-invalid");
      telInput.classList.remove("is-valid");
      telInput.nextElementSibling.textContent = "Ingrese un teléfono válido (solo números, - o +) sin espacios";
    } else if (telInput) {
      telInput.classList.remove("is-invalid");
      telInput.classList.add("is-valid");
    }

  form.classList.add("was-validated");
});
