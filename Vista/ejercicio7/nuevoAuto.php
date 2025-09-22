<?php
include_once '../../configuracion.php';
include_once '../estructura/header.php';
$objAbmPersona = new AbmPersona();
?>

<div class="container mt-4">
    <h2 class="mb-4 text-center">Cargar Nuevo Auto</h2>

    <form id="formNuevoAuto" action="accionNuevoAuto.php" method="post"
        class="p-4 border rounded shadow-sm bg-light needs-validation" novalidate>

        
        <div class="mb-3">
            <label for="patente" class="form-label">Patente</label>
            <input type="text" id="patente" name="patente" class="form-control patente"
                placeholder="Ej: ABC 123 o AB 123 CD" maxlength="9" required>

            <div class="invalid-feedback">Ingrese una patente válida (Ej: ABC 123 o AB 123 CD).</div>
        </div>

  
        <div class="mb-3">
            <label for="marca" class="form-label">Marca</label>
            <input type="text" id="marca" name="marca" class="form-control" required>
            <div class="invalid-feedback">Ingrese la marca del auto.</div>
        </div>

      
        <div class="mb-3">
            <label for="modelo" class="form-label">Modelo</label>
            <input type="number" id="modelo" name="modelo" class="form-control" min="1900" max="2099" required>
            <div class="invalid-feedback">Ingrese un modelo válido.</div>
        </div>

        <hr>

        <h5>Datos del Dueño</h5>

 
        <div class="mb-3">
            <label for="dniDuenio" class="form-label">DNI del Dueño</label>
            <input type="number" id="dni" name="nroDni" class="form-control dni" 
                   placeholder="Ingrese DNI" required min="1000000" max="999999999">
            <div class="invalid-feedback">Ingrese el DNI del dueño.</div>
        </div>

        <div class="d-grid mt-3">
            <button type="submit" class="btn btn-success">Cargar Auto</button>
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