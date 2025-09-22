<?php
include_once '../../configuracion.php';
include_once '../estructura/header.php';

$datos = data_submitted(); // tu función de util/funciones.php
$objAbmPersona = new AbmPersona();

$resp = $objAbmPersona->alta($datos);
?>

<div class="container mt-4">
    <?php if ($resp) { ?>
        <div class="alert alert-success" role="alert">
            La persona se cargó correctamente.
        </div>
    <?php } else { ?>
        <div class="alert alert-danger" role="alert">
            No se pudo cargar la persona. Posiblemente ya existe el DNI o faltan datos obligatorios.
        </div>
    <?php } ?>
    <a href="NuevaPersona.php" class="btn btn-primary mt-3">Volver al formulario</a>
</div>

<?php
include_once '../estructura/footer.php';
?>
