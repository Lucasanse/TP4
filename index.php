<?php
include_once "vista/estructura/header.php";
?>

<style>
/* Efecto hover para todas las cards del menú */
.menu-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    cursor: pointer;
}

.menu-card:hover {
    transform: translateY(-8px) scale(1.05); /* Se eleva y hace un leve zoom */
    box-shadow: 0 8px 20px rgba(0,0,0,0.3);
}
</style>

<div class="container mt-5">
    <h1 class="text-center mb-5">Menú Principal</h1>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">

       
        <div class="col">
            <a href="vista/ejercicio3/verAutos.php" class="text-decoration-none">
                <div class="card h-100 shadow-sm border-success menu-card">
                    <div class="card-body text-center">
                        <h5 class="card-title text-success">Ejercicio 3</h5>
                        <p class="card-text">Ver lista de autos</p>
                        <i class="bi bi-car-front-fill fs-2 text-success"></i>
                    </div>
                </div>
            </a>
        </div>


        <div class="col">
            <a href="vista/ejercicio4/buscarAuto.php" class="text-decoration-none">
                <div class="card h-100 shadow-sm border-primary menu-card">
                    <div class="card-body text-center">
                        <h5 class="card-title text-primary">Ejercicio 4</h5>
                        <p class="card-text">Buscar auto</p>
                        <i class="bi bi-search fs-2 text-primary"></i>
                    </div>
                </div>
            </a>
        </div>

    
        <div class="col">
            <a href="vista/ejercicio5/listaPersonas.php" class="text-decoration-none">
                <div class="card h-100 shadow-sm border-warning menu-card">
                    <div class="card-body text-center">
                        <h5 class="card-title text-warning">Ejercicio 5</h5>
                        <p class="card-text">Lista de personas</p>
                        <i class="bi bi-people fs-2 text-warning"></i>
                    </div>
                </div>
            </a>
        </div>

        
        <div class="col">
            <a href="vista/ejercicio5/autosPersona.php" class="text-decoration-none">
                <div class="card h-100 shadow-sm border-info menu-card">
                    <div class="card-body text-center">
                        <h5 class="card-title text-info">Ejercicio 5</h5>
                        <p class="card-text">Autos según la persona</p>
                        <i class="bi bi-card-list fs-2 text-info"></i>
                    </div>
                </div>
            </a>
        </div>

       
        <div class="col">
            <a href="vista/ejercicio6/NuevaPersona.php" class="text-decoration-none">
                <div class="card h-100 shadow-sm border-success menu-card">
                    <div class="card-body text-center">
                        <h5 class="card-title text-success">Ejercicio 6</h5>
                        <p class="card-text">Añadir nueva persona</p>
                        <i class="bi bi-person-plus fs-2 text-success"></i>
                    </div>
                </div>
            </a>
        </div>

        <div class="col">
            <a href="vista/ejercicio7/NuevoAuto.php" class="text-decoration-none">
                <div class="card h-100 shadow-sm border-danger menu-card">
                    <div class="card-body text-center">
                        <h5 class="card-title text-danger">Ejercicio 7</h5>
                        <p class="card-text">Añadir nuevo auto</p>
                        <i class="bi bi-car-front fs-2 text-danger"></i>
                    </div>
                </div>
            </a>
        </div>

      
        <div class="col">
            <a href="vista/ejercicio8/CambioDuenio.php" class="text-decoration-none">
                <div class="card h-100 shadow-sm border-warning menu-card">
                    <div class="card-body text-center">
                        <h5 class="card-title text-warning">Ejercicio 8</h5>
                        <p class="card-text">Cambiar auto de dueño</p>
                        <i class="bi bi-arrow-repeat fs-2 text-warning"></i>
                    </div>
                </div>
            </a>
        </div>

 
        <div class="col">
            <a href="vista/ejercicio9/BuscarPersona.php" class="text-decoration-none">
                <div class="card h-100 shadow-sm border-primary menu-card">
                    <div class="card-body text-center">
                        <h5 class="card-title text-primary">Ejercicio 9</h5>
                        <p class="card-text">Actualizar datos de persona</p>
                        <i class="bi bi-person-badge fs-2 text-primary"></i>
                    </div>
                </div>
            </a>
        </div>

    </div>
</div>

<?php
include_once "vista/estructura/footer.php";
?>