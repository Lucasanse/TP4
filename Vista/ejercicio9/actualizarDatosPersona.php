<?php
include_once '../../configuracion.php';
include_once '../estructura/header.php';

$datos = data_submitted();
$objAbmPersona = new AbmPersona();

$mensaje = ""; // variable para centralizar el mensaje

if (isset($datos['nroDni'])) {
    // Buscamos la persona por DNI
    $personaArr = $objAbmPersona->buscar(['nroDni' => $datos['nroDni']]);
    if (count($personaArr) > 0) {
        $param = [
            'nroDni' => $datos['nroDni'],
            'nombre' => $datos['nombre'],
            'apellido' => $datos['apellido'],
            'fechaNac' => $datos['fechaNac'],
            'telefono' => $datos['telefono'],
            'domicilio' => $datos['domicilio']
        ];

        if ($objAbmPersona->modificacion($param)) {
            $mensaje = "<div class='alert alert-success'>Persona actualizada correctamente.</div>";
        } else {
            $mensaje = "<div class='alert alert-danger'>Error al actualizar la persona " . htmlspecialchars($datos['nroDni']) . ".</div>";
        }
    } else {
        $mensaje = "<div class='alert alert-warning'>No se encontró la persona con DNI: " . htmlspecialchars($datos['nroDni']) . "</div>";
    }
} else {
    $mensaje = "<div class='alert alert-danger'>No se cargaron datos.</div>";
}
?>

<div class="container mt-4">
    <?= $mensaje ?>

    <div class="mt-3">
        <a href="BuscarPersona.php" class="btn btn-primary">Volver</a>
    </div>
</div>

<?php
include_once '../estructura/footer.php';
?>
