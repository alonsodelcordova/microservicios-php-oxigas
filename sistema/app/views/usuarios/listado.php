

<div class="container">
    <h1 class="title">Lista de Usuarios</h1>
    <span class="subtitle">Bienvenida: <?php echo $email_sesion; ?></span>
    <table>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Fecha de creacion</th>
            <th></th>
        </tr>
        <?php foreach($resultado as $row): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['fecha_registro']; ?></td>
            <td><a href="/usuarios/eliminar.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">
                <i class="fa fa-trash"></i>
            </a></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <div class="pagination">
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
