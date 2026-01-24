<?php

# url
$url = $_SERVER['REQUEST_URI'];
$path = explode('/', $url)[1] ?? '';

?>

<nav class="navbar navbar-expand-lg navbar-dark bg-success">
  <a class="navbar-brand" href="/">
     <? echo $title ?? 'Mi App'; ?> 
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item <?php if($path == ''){ echo 'active'; } ?>">
        <a class="nav-link " href="/home">Home</a>
      </li>
      <li class="nav-item <?php if($path == 'usuarios'){ echo 'active'; } ?>">
        <a class="nav-link " href="/usuarios">Usuarios</a>
      </li>
      <li class="nav-item dropdown <?php if($path == 'clientes'){ echo 'active'; } ?>">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Clientes
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="/clientes">Listado</a>
          <a class="dropdown-item" href="/clientes/nuevo">Agregar</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something </a>
        </div>
      </li>

      <li class="nav-item dropdown <?php if($path == 'productos'){ echo 'active'; } ?>">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Productos
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="/productos">Listado</a>
          <a class="dropdown-item" href="/productos/nuevo">Agregar</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something </a>
        </div>
      </li>

    </ul>
    <ul class="navbar-nav ">
      <li class="nav-item">
        
        <a class="nav-link" href="/home/logout">
           <i class="fa fa-user"></i> Logout
        </a>
        
      </li>
    </ul>
  </div>
</nav>