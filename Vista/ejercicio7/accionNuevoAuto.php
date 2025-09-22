<?php
include_once '../../configuracion.php';
include_once '../estructura/header.php';

$datos = data_submitted();
$objAbmPersona = new AbmPersona();
$objAbmAuto = new AbmAuto();



?>

<div class="container mt-4">
    <?php
    // Validamos que la persona dueña exista
    if (!$datos) {
        echo '<div class="alert alert-danger" role="alert">
                No se cargaron datos
              </div>';
    } else {
        $personaArr = $objAbmPersona->buscar(['nroDni' => $datos['nroDni']]);
        $personaExiste = count($personaArr) > 0;
        if (!$personaExiste) {
            echo '<div class="alert alert-warning" role="alert">
            La persona con DNI ' . htmlspecialchars($datos['nroDni']) . ' no está cargada en la base.
            <a href="../ejercicio6/nuevaPersona.php" class="alert-link">Cargar nueva persona</a>
          </div>';
        } else {
            // Intentamos dar de alta el auto
            $resp = $objAbmAuto->alta($datos);

            if ($resp) {
                echo '<div class="alert alert-success" role="alert">
                El auto se cargó correctamente.
              </div>';

                // Buscamos el auto recién cargado para mostrar los datos
                $autoArr = $objAbmAuto->buscar(['patente' => $datos['patente']]);
                $auto = $autoArr[0];
                $duenio = $auto->getDuenio();
    ?>

                <h5>Datos del Auto:</h5>
                <table class="table table-bordered mt-2">
                    <tr>
                        <th>Patente</th>
                        <td><?= htmlspecialchars($auto->getPatente()) ?></td>
                    </tr>
                    <tr>
                        <th>Marca</th>
                        <td><?= htmlspecialchars($auto->getMarca()) ?></td>
                    </tr>
                    <tr>
                        <th>Modelo</th>
                        <td><?= htmlspecialchars($auto->getModelo()) ?></td>
                    </tr>
                    <tr>
                        <th>DNI Dueño</th>
                        <td><?= htmlspecialchars($duenio->getNroDni()) ?></td>
                    </tr>
                    <tr>
                        <th>Nombre Dueño</th>
                        <td><?= htmlspecialchars($duenio->getNombre()) ?></td>
                    </tr>
                    <tr>
                        <th>Apellido Dueño</th>
                        <td><?= htmlspecialchars($duenio->getApellido()) ?></td>
                    </tr>
                </table>

    <?php
            } else {
                echo '<div class="alert alert-danger" role="alert">
                No se pudo cargar el auto. Posiblemente ya existe la patente o faltan datos.
              </div>';
            }
        }
    }

    ?>

    <a href="NuevoAuto.php" class="btn btn-primary mt-3">Volver al formulario</a>
</div>

<?php
include_once '../estructura/footer.php';
?>