<?php
include_once '../../configuracion.php';
include_once '../estructura/header.php';

$datos = data_submitted();
$patente = $datos['patente'] ?? null;

if ($patente) {
    $objAbmAuto = new AbmAuto();
    $lista = $objAbmAuto->buscar(['patente' => $patente]);
}
?>

<div class="container">
    <h2 class="mb-4 text-center">Resultado de la Búsqueda</h2>

    <?php if ($patente && !empty($lista)) { 
        $auto = $lista[0];
        $duenio = $auto->getDuenio();
        ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped text-center align-middle">
                <thead class="table-success">
                    <tr>
                        <th>Patente</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Dueño</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $auto->getPatente(); ?></td>
                        <td><?= $auto->getMarca(); ?></td>
                        <td><?= $auto->getModelo(); ?></td>
                        <td>
                            <?php 
                            if ($duenio) {
                                echo $duenio->getNombre() . " " . $duenio->getApellido();
                            } else {
                                echo "<em>Sin dueño registrado</em>";
                            }
                            ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="text-center mt-3">
            <a href="buscarAuto.php" class="btn btn-outline-success">Buscar otro auto</a>
        </div>
    <?php } elseif ($patente) { ?>
        <div class="alert alert-danger text-center" role="alert">
            No se encontró ningún auto con la patente <strong><?= htmlspecialchars($patente) ?></strong>.
        </div>
        <div class="text-center mt-3">
            <a href="buscarAuto.php" class="btn btn-outline-danger">Volver a intentar</a>
        </div>
    <?php } else { ?>
        <div class="alert alert-warning text-center" role="alert">
            No se recibió ninguna patente para buscar.
        </div>
        <div class="text-center mt-3">
            <a href="buscarAuto.php" class="btn btn-outline-warning">Volver al formulario</a>
        </div>
    <?php } ?>
</div>

<?php
include_once '../estructura/footer.php';
?>
