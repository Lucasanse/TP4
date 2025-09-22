<?php
include_once '../../configuracion.php';
include_once '../estructura/header.php';

$datos = data_submitted();
$objAbmPersona = new AbmPersona();
$persona = null;
?>
<div class="container mt-4">
    <h2 class="mb-4 text-center">Modificar Datos de Persona</h2>
    <?php
    if (isset($datos['nroDni'])) {
        $personaArr = $objAbmPersona->buscar(['nroDni' => $datos['nroDni']]);
        if (count($personaArr) > 0) {
            $persona = $personaArr[0];
        } else {
            echo "<div class='alert alert-warning'>No se encontró la persona con DNI: " . htmlspecialchars($datos['nroDni']) . "</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>No se cargaron datos.</div>";
    }

    if ($persona) { ?>
        <form id="formActualizarPersona" action="ActualizarDatosPersona.php" method="post"
            class="p-4 border rounded shadow-sm bg-light needs-validation" novalidate>
            <input type="hidden" id="nroDni" name="nroDni" value="<?= htmlspecialchars($persona->getNroDni()) ?>">

            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" id="apellido" name="apellido" class="form-control"
                    value="<?= htmlspecialchars($persona->getApellido()) ?>" required>
                <div class="invalid-feedback">Ingrese el apellido.</div>
            </div>

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="form-control"
                    value="<?= htmlspecialchars($persona->getNombre()) ?>" required>
                <div class="invalid-feedback">Ingrese el nombre.</div>
            </div>

            <div class="mb-3">
                <label for="fechaNac" class="form-label">Fecha de Nacimiento</label>
                <input type="date" id="fechaNac" name="fechaNac" class="form-control"
                    value="<?= htmlspecialchars($persona->getFechaNac()) ?>" required>
                <div class="invalid-feedback">Ingrese la fecha de nacimiento.</div>
            </div>

            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" id="telefono" name="telefono" class="form-control"
                    value="<?= htmlspecialchars($persona->getTelefono()) ?>" required>
                <div class="invalid-feedback">Ingrese un teléfono.</div>
            </div>

            <div class="mb-3">
                <label for="domicilio" class="form-label">Domicilio</label>
                <input type="text" id="domicilio" name="domicilio" class="form-control"
                    value="<?= htmlspecialchars($persona->getDomicilio()) ?>" required>
                <div class="invalid-feedback">Ingrese el domicilio.</div>
            </div>

            <div class="d-grid mt-3">
                <button type="submit" class="btn btn-success">Actualizar Persona</button>
            </div>
        </form>
    <?php } ?>

    <div class="mt-3">
        <a href="BuscarPersona.php" class="btn btn-primary">Volver</a>
    </div>
</div>

<!-- JS Validaciones -->
<script src="../js/validarPersona.js"></script>

<?php
include_once '../estructura/footer.php';
?>
