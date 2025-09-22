<?php
include_once '../../configuracion.php';
include_once '../estructura/header.php';
?>

<div class="container mt-4">
    <h2 class="mb-4 text-center">Buscar persona por DNI para modificarla</h2>

    <form id="formBuscarPersona" action="accionBuscarPersona.php" method="post"
          class="p-4 border rounded shadow-sm bg-light needs-validation" novalidate>
        
        <div class="mb-3">
            <label for="nroDni" class="form-label">Número de Documento</label>
            <input type="number" id="nroDni" name="nroDni" class="form-control dni" 
                   placeholder="Ingrese DNI" required min="1000000">
            <div class="invalid-feedback">Ingrese un DNI válido (7 dígitos o más).</div>
        </div>

        <div class="d-grid mt-3">
            <button type="submit" class="btn btn-success">Buscar Persona</button>
        </div>
        
    </form>
            <div class="mt-4 text-center">
        <a href="../../index.php" class="btn btn-primary">Volver al Menú Principal</a>
    </div>
</div>

<script src="../js/validarPersona.js"></script>

<?php
include_once '../estructura/footer.php';
?>
