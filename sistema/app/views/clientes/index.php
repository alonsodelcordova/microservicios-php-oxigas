
<div class="container">
    <h1>Listado de Clientes</h1>
    <a href="/clientes/nuevo" class="btn btn-primary">
        <i class="fa fa-plus"></i> Agregar
    </a>

    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Fecha</th>
            <th></th>
        </tr>
    <?php


        foreach($resultado as $row){
            
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['nombre'] . "</td>";
            echo "<td>" . $row['apellido'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['telefono'] . "</td>";
            echo "<td> " . date('d/m/Y', strtotime($row['fecha_registro'])) . "</td>";
            echo "<td><a href='/clientes/eliminar?id=" . $row['id'] . "' class='btn btn-danger'>
                <i class='fa fa-trash'></i>
            </a></td>";
            echo "</tr>";
        }
    ?>
    </table>

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
