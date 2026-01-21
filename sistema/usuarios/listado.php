<?php
    include '../db/usuarios_db.php';
session_start();

$email_sesion = null;

if(!isset($_SESSION['email'])){
    header("Location: /usuarios");
    exit;
}else{
    $email_sesion = $_SESSION['email'];
}


$registros_por_pagina = 20;
$pagina_actual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
if ($pagina_actual < 1) {
    $pagina_actual = 1;
}
$resultado = UsuariosDB::consultarUsuarios($pagina_actual, $registros_por_pagina);
$total_paginas = UsuariosDB::consultarTotalPaginas($registros_por_pagina);



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" href="/static/css/login.css">
</head>
<body>
    
    <div class="content">
        <a href="/usuarios/logout.php">&laquo; Logout</a>
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
                <td><a href="/usuarios/eliminar.php?id=<?php echo $row['id']; ?>" class="button-error">Eliminar</a></td>
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
   
</body>
</html>