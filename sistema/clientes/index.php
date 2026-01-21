<?php
    include '../db/clientes_db.php';
    session_start();

    // Número de registros por página
    $registros_por_pagina = 20;

    // Obtener el número de página actual desde la URL
    $pagina_actual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    if ($pagina_actual < 1) {
        $pagina_actual = 1;
    }
    $resultado = ClientesDB::consultarClientes($pagina_actual, $registros_por_pagina);
    // Calcular el número total de páginas
    $total_paginas = ClientesDB::consultarTotalPaginas($registros_por_pagina);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <link rel="stylesheet" href="/static/css/main.css">
</head>

<body>



<h1>Listado de Clientes</h1>
<a href="/nuevo.php" class="button">Crear Cliente</a>

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
        echo "<td>" . $row['fecha_registro'] . "</td>";
        echo "<td><a href='/eliminar.php?id=" . $row['id'] . "' class='button-error'>Eliminar</a></td>";
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
    
</body>
</html>

