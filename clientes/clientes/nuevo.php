
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cliente</title>
    <link rel="stylesheet" href="/clientes/static/css/main.css">
</head>
<body>

<?php
$mensaje = null;
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include 'db/conexion.php';

    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    
    
    // Llamar a la función para crear el cliente
    if(Conexion::crearCliente($nombre, $apellido, $email, $telefono)){
        echo "<script>
        alert('Cliente creado correctamente');
        window.location.href = '/clientes';
        </script>";
       
    }else{
        $mensaje = "Error al crear el cliente";
    }
}

?>

    <div class="container">

        <h2>Crear Cliente</h2>

        <?php if($mensaje!=null): ?>
            <div class="error"><?php echo $mensaje; ?></div>
        <?php endif; ?>

        <form action="/clientes/nuevo.php" method="POST">
            <div class="input-group">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="input-group">
                <label for="apellido">Apellido</label>
                <input type="text" id="apellido" name="apellido" required>
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="telefono">Teléfono</label>
                <input type="tel" id="telefono" name="telefono" required>
            </div>
            <button type="submit" class="button">Guardar</button>
        </form>
    </div>
    
</body>
</html>

