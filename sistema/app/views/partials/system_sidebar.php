<?php

# url
$url = $_SERVER['REQUEST_URI'];
$path = explode('/', $url)[1] ?? '';

?>
<nav id="sidebar">
    <div class="sidebar-header d-flex align-items-center">
        <i class="mr-2 text-primary fa fa-database"></i>
        <h5 class="mb-0">ERP System</h5>
    </div>
    <div class="list-group list-group-flush mt-3">
        <a class="list-group-item list-group-item-action <?php if($path == '' ||  $path == '/' || $path == 'home'){ echo 'active'; } ?>" href="/home">
            <i class="fa fa-dashboard"></i> Dashboard
        </a>
        <a class="list-group-item list-group-item-action <?php if($path == 'productos'){ echo 'active'; } ?>" href="/productos">
            <i class="fa fa-cart-plus"></i> Productos
        </a>
        <a class="list-group-item list-group-item-action <?php if($path == 'pedidos'){ echo 'active'; } ?>" href="/pedidos">
            <i class="fa fa-table"></i> Pedidos
        </a>
        <a class="list-group-item list-group-item-action <?php if($path == 'ventas'){ echo 'active'; } ?>" href="/ventas">
            <i class="fa fa-shopping-cart"></i> Ventas
        </a>
        <a class="list-group-item list-group-item-action <?php if($path == 'usuarios'){ echo 'active'; } ?>" href="/usuarios">
            <i class="fa fa-users"></i> Usuarios
        </a>
        <a class="list-group-item list-group-item-action <?php if($path == 'clientes'){ echo 'active'; } ?>" href="/clientes">
            <i class="fa fa-users"></i> clientes
        </a>

        <a class="list-group-item list-group-item-action <?php if($path == 'config'){ echo 'active'; } ?>" href="/config">
            <i class="fa fa-cog"></i> Settings
        </a>
    </div>
    <div class="p-3 mt-auto">
        <button class="btn btn-primary btn-block">
            <i class="fa fa-sign-out"></i> Cerrar Sesión
        </button>
    </div>
</nav>