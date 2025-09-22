<?php
include_once '../../configuracion.php';
include_once '../estructura/header.php';
?>

<div class="container mt-4">
    <h2 class="mb-4 text-center">Cambio de Dueño de Auto</h2>

    <form id="formCambioDuenio" action="accionCambioDuenio.php" method="post"
          class="p-4 border rounded shadow-sm bg-light needs-validation" novalidate>

        <!-- Patente -->
        <div class="mb-3">
            <label for="patente" class="form-label">Número de Patente</label>
            <input type="text" id="patente" name="patente" class="form-control patente" 
                   placeholder="Ej: ABC 123 o AB 123 CD" maxlength="9" required>
            <div class="invalid-feedback">Ingrese una patente válida (Ej: ABC 123 o AB 123 CD).</div>
        </div>

        <!-- DNI del Nuevo Dueño -->
        <div class="mb-3">
            <label for="dni" class="form-label">DNI del Nuevo Dueño</label>
            <input type="number" id="dni" name="nroDni" class="form-control dni" 
                   placeholder="Ingrese DNI" required min="1000000" max="999999999">
            <div class="invalid-feedback">Ingrese un DNI válido (entre 7 y 9 números)</div>
        </div>

        <div class="d-grid mt-3">
            <button type="submit" class="btn btn-success">Cambiar Dueño</button>
        </div>
    </form>

    <div class="mt-4 text-center">
        <a href="../../index.php" class="btn btn-primary">Volver al Menú Principal</a>
    </div>
</div>


<!-- JS Validaciones -->
<script src="../js/validarPatente.js"></script>
<script src="../js/validarPersona.js"></script>

<?php
include_once '../estructura/footer.php';
?>
