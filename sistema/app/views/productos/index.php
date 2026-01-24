
<div class="container my-3">

    <h1>Productos</h1>

     <a href="/productos/nuevo" class="btn btn-primary">
        <i class="fa fa-plus"></i> Agregar
    </a>

    <div class="row mt-3">
        <?php foreach($resultado as $producto): ?>
            <div class="col-md-4">
                <div class="card">
                    <img src="<?= $producto['url_imagen'] ?>" alt="producto" class="card-img-top" width="100" height="180">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase"><?= $producto['nombre'] ?></h5>
                        <span class="card-text">Categoria: <?= $producto['categoria'] ?></span> <br>
                        <span class="card-text">S/. <?= $producto['precio'] ?></span> <br>
                        <span class="card-text">Usuario: <?= $producto['usuario'] ?></span>  <br>
                        <span class="card-text"><?=  date('d/m/Y', strtotime($producto['fecha_registro'])) ?></span> <br>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="/productos/editar?id=<?= $producto['id'] ?>" class="btn btn-warning m-1">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="/productos/eliminar?id=<?= $producto['id'] ?>" class="btn btn-danger m-1">
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