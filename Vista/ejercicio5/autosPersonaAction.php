<?php
include_once '../../configuracion.php';
include_once '../estructura/header.php';

$datos = data_submitted();
$objAbmPersona = new AbmPersona();
$objAbmAuto = new AbmAuto();

$persona = null;
$autos = [];

if (!empty($datos['dni'])) {
    $personaArr = $objAbmPersona->buscar(['nroDni' => $datos['dni']]); 
    // fijate bien cómo se llama el campo en tu modelo/clase Persona
    if (!empty($personaArr)) {
        $persona = $personaArr[0];
        $autos = $objAbmAuto->buscar(['DniDuenio' => $persona->getNroDni()]);
    }
}
?>

<div class="container mt-4">
    <?php if ($persona) { ?>
        <h2>Datos de la Persona</h2>
        <table class="table table-bordered w-50">
            <tr><th>DNI</th><td><?= $persona->getNroDni(); ?></td></tr>
            <tr><th>Nombre</th><td><?= $persona->getNombre(); ?></td></tr>
            <tr><th>Apellido</th><td><?= $persona->getApellido(); ?></td></tr>
            <tr><th>Fecha Nac.</th><td><?= $persona->getFechaNac(); ?></td></tr>
            <tr><th>Teléfono</th><td><?= $persona->getTelefono(); ?></td></tr>
            <tr><th>Domicilio</th><td><?= $persona->getDomicilio(); ?></td></tr>
        </table>

        <h3 class="mt-4">Autos Asociados</h3>
        <?php if (count($autos) > 0) { ?>
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Patente</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($autos as $auto) { ?>
                        <tr>
                            <td><?= $auto->getPatente(); ?></td>
                            <td><?= $auto->getMarca(); ?></td>
                            <td><?= $auto->getModelo(); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <div class="alert alert-info">Esta persona no tiene autos asociados.</div>
        <?php } ?>
        <a href="autosPersona.php" class="btn btn-secondary mt-3">Volver</a>
    <?php } else { ?>
        <div class="alert alert-danger">No se encontró la persona con el DNI especificado.</div>
        <a href="autosPersona.php" class="btn btn-secondary mt-3">Volver</a>
    <?php } ?>
</div>

<?php include_once '../estructura/footer.php'; ?>
