<?php

include_once '../../configuracion.php';
include_once("../estructura/header.php");

$objAbmAuto = new AbmAuto();
$listaAutos = $objAbmAuto->buscar(null);
?>

<div class="container">
    <h2 class="mb-4 text-center">Listado de Autos</h2>

    <?php if (count($listaAutos) > 0) { ?>
        <div class="table-responsive">
            <table class="table table-striped table-bordered text-center align-middle">
                <thead class="table-success">
                    <tr>
                        <th>Patente</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Dueño</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listaAutos as $auto) { 
                        $duenio = $auto->getDuenio();
                        ?>
                        <tr>
                            <td><?php echo $auto->getPatente(); ?></td>
                            <td><?php echo $auto->getMarca(); ?></td>
                            <td><?php echo $auto->getModelo(); ?></td>
                            <td>
                                <?php 
                                if ($duenio != null) {
                                    echo $duenio->getNombre() . " " . $duenio->getApellido();
                                } else {
                                    echo "<em>Sin dueño registrado</em>";
                                }
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    <?php } else { ?>
        <div class="alert alert-warning text-center" role="alert">
            No hay autos cargados en la base de datos.
        </div>
    <?php } ?>
        <div class="mt-4 text-center">
        <a href="../../index.php" class="btn btn-primary">Volver al Menú Principal</a>
    </div>
</div>

<?php
include_once("../estructura/footer.php");
?>
