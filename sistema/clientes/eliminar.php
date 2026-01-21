<?php
    include '../db/clientes_db.php';
if(isset($_GET['id'])){
    $cliente = ClientesDB::consultarCliente($_GET['id']);
    if($cliente){
        ClientesDB::eliminarCliente($_GET['id']);
        echo "<script>alert('Cliente eliminado');</script>";
    }else{
        echo "<script>alert('Cliente no encontrado');</script>";
    }
}else{
    echo "<script>alert('ID de cliente no proporcionado');</script>";
}
echo "<script>window.location.href = '/clientes';</script>";
exit;