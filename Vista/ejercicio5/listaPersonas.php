<?php
include_once "../../configuracion.php";
include_once "../estructura/header.php";

$objAbmPersona = new AbmPersona();
$personas = $objAbmPersona->buscar(null);
?>

<div class="container mt-4">
    <h2 class="mb-4">Listado de Personas</h2>

    <?php if (count($personas) > 0) { ?>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>DNI</th>
                    <th>Apellido</th>
                    <th>Nombre</th>
                    <th>Fecha Nac.</th>
                    <th>Teléfono</th>
                    <th>Domicilio</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($personas as $persona) { ?>
                    <tr>
                        <td><?= $persona->getNroDni(); ?></td>
                        <td><?= $persona->getApellido(); ?></td>
                        <td><?= $persona->getNombre(); ?></td>
                        <td><?= $persona->getFechaNac(); ?></td>
                        <td><?= $persona->getTelefono(); ?></td>
                        <td><?= $persona->getDomicilio(); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <div class="text-center mt-4">
        <a href="autosPersona.php" class="btn btn-success">Ver autos por persona</a>
                  
        <a href="../../index.php" class="btn btn-primary">Volver al Menú Principal</a>
 
        </div>

    <?php } else { ?>
        <div class="alert alert-warning">No hay personas cargadas en el sistema.</div>
    <?php } ?>
</div>

<?php
include_once "../estructura/footer.php";
?>
