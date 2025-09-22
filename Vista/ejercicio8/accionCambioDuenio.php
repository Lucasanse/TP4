<?php
include_once '../../configuracion.php';
include_once '../estructura/header.php';

$objAbmAuto = new AbmAuto();
$objAbmPersona = new AbmPersona();

$datos = data_submitted();
$mensaje = "";

// Validar que lleguen los datos
if (!isset($datos['patente']) || !isset($datos['nroDni'])) {
    $mensaje = "Error: Debe completar todos los campos.";
} else {
    $patente = strtoupper(trim($datos['patente']));
    $dni = $datos['nroDni'];

    // Buscar Auto
    $autos = $objAbmAuto->buscar(['patente' => $patente]);
    if (count($autos) === 0) {
        $mensaje = "Error: No se encontró ningún auto con la patente '$patente'.";
    } else {
        $auto = $autos[0];

        // Buscar Persona
        $personas = $objAbmPersona->buscar(['nroDni' => $dni]);
        if (count($personas) === 0) {
            $mensaje = "Error: No se encontró ninguna persona con DNI '$dni'.";
        } else {
            $persona = $personas[0];

            // Cambiar dueño
            $param = [
                'patente' => $auto->getPatente(),
                'marca' => $auto->getMarca(),
                'modelo' => $auto->getModelo(),
                'nroDni' => $persona->getNroDni()
            ];

            if ($objAbmAuto->modificacion($param)) {
                $mensaje = "Éxito: El dueño del auto con patente '$patente' se cambió correctamente a '{$persona->getNombre()} {$persona->getApellido()}'.";
            } else {
                $mensaje = "Error: No se pudo actualizar el dueño del auto.";
            }
        }
    }
}
?>

<div class="container mt-4">
    <div class="alert <?php echo (strpos($mensaje,'Éxito') !== false) ? 'alert-success' : 'alert-danger'; ?> text-center">
        <?php echo $mensaje; ?>
    </div>
    <div class="d-flex justify-content-center mt-3">
        <a href="CambioDuenio.php" class="btn btn-primary">Volver al formulario</a>
    </div>
</div>

<?php
include_once '../estructura/footer.php';
?>
