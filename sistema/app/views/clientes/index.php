
<div class="container my-2">
    <h1>Listado de Clientes</h1>
    <a href="/clientes/nuevo" class="btn btn-primary">
        <i class="fa fa-plus"></i> Agregar
    </a>

    <div class="row mt-3">
        <?php foreach($resultado as $cliente): ?>
            <div class="col-md-6 col-lg-4">
                <div class="card m-2">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase"><?= $cliente['nombre'].' '.$cliente['apellido'] ?></h5>
                        <span class="card-text">Email: <?= $cliente['email'] ?></span> <br>
                        <span class="card-text">Teléfono: <?= $cliente['telefono'] ?></span> <br>
                        <span class="card-text">Fecha: <?=  date('d/m/Y', strtotime($cliente['fecha_registro'])) ?></span> <br>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="/clientes/editar?id=<?= $cliente['id'] ?>" class="btn btn-warning m-1">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="/clientes/eliminar?id=<?= $cliente['id'] ?>" class="btn btn-danger m-1">
                            <i class="fa fa-trash"></i>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class='pagination'>
        <?php
        // Mostrar la paginación
        if ($pagina_actual > 1) {
            echo "<a href='?pagina=" . ($pagina_actual - 1) . "'>Anterior</a>";
        }
            for ($i = 1; $i <= $total_paginas; $i++) {
                if ($i == $pagina_actual) {
                    echo "<a class='active' href='?pagina=$i'>$i</a>";
                } else {
                    echo "<a href='?pagina=$i'>$i</a>";
                }
            }
    
        if ($pagina_actual < $total_paginas) {
            echo "<a href='?pagina=" . ($pagina_actual + 1) . "'>Siguiente</a>";
        }
    ?>
    </div>
        
</div>
