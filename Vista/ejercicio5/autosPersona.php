<?php
include_once '../../configuracion.php';
include_once '../estructura/header.php';
?>

<div class="container mt-4">
    <h2>Buscar autos de una Persona</h2>
    <form id="formAutosPersona" method="get" action="autosPersonaAction.php" class="needs-validation" novalidate>
        <div class="mb-3">
            <label for="dni" class="form-label">DNI de la persona</label>
            <input type="number" class="form-control" id="dni" name="dni" required>
            <div class="invalid-feedback">
                Ingrese un DNI válido.
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Ver Autos</button>
        <a href="listaPersonas.php" class="btn btn-secondary">Ver lista de personas</a>
    </form>
</div>

<script>
(() => {
  'use strict';
  const form = document.getElementById('formAutosPersona');
  form.addEventListener('submit', event => {
    if (!form.checkValidity()) {
      event.preventDefault();
      event.stopPropagation();
    }
    form.classList.add('was-validated');
  }, false);
})();
</script>

<?php include_once '../estructura/footer.php'; ?>
