<?php
include_once '../../configuracion.php';
include_once '../estructura/header.php';
?>

<div class="container">
    <h2 class="mb-4 text-center">Buscar Auto por Patente</h2>

    <form id="formBuscarAuto" action="actionBuscarAuto.php" method="get"
        class="p-4 border rounded shadow-sm bg-light needs-validation" novalidate>
        <div class="mb-3">
            <label for="patente" class="form-label">Número de Patente</label>
            <input type="text" id="patente" name="patente" class="form-control patente"
                placeholder="Ej: ABC 123 o AB 123 CD" maxlength="9" required>

            <div id="patenteFeedback" class="invalid-feedback" style="display:none;"></div>
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-success">Buscar Auto</button>
        </div>
    </form>
    <div class="mt-4 text-center">
        <a href="../../index.php" class="btn btn-primary">Volver al Menú Principal</a>
    </div>
</div>

<script src="../js/validarPatente.js"></script>

<?php
include_once '../estructura/footer.php';
?>