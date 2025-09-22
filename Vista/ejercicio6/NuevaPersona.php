<?php
include_once '../../configuracion.php';
include_once '../estructura/header.php';
?>

<div class="container">
    <h2 class="mb-4 text-center">Ingresar nueva persona</h2>

    <form id="formNuevaPersona" action="accionNuevaPersona.php" method="post" 
          class="p-4 border rounded shadow-sm bg-light needs-validation" novalidate>
        
        <div class="mb-3">
            <label for="nroDni" class="form-label">Número de DNI</label>
            <input type="number" id="dni" name="nroDni" class="form-control dni" 
                   placeholder="Ingrese DNI" required min="1000000" max="999999999">
            <div class="invalid-feedback">Ingrese un DNI válido.</div>
        </div>

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" id="nombre" name="nombre" class="form-control" required>
            <div class="invalid-feedback">Ingrese el nombre.</div>
        </div>

        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" id="apellido" name="apellido" class="form-control" required>
            <div class="invalid-feedback">Ingrese el apellido.</div>
        </div>

        <div class="mb-3">
            <label for="fechaNac" class="form-label">Fecha de Nacimiento</label>
            <input type="date" id="fechaNac" name="fechaNac" class="form-control" required>
            <div class="invalid-feedback">Ingrese le fecha de nacimiento.</div>
        </div>

        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" id="telefono" name="telefono" class="form-control" required>
            <div class="invalid-feedback">Ingrese un telefono</div>
        </div>

        <div class="mb-3">
            <label for="domicilio" class="form-label">Domicilio</label>
            <input type="text" id="domicilio" name="domicilio" class="form-control" required>
            <div class="invalid-feedback">Ingrese el domicilio.</div>
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-success">Agregar Persona</button>
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
