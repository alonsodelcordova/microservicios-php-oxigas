<?php

class UsuariosController extends Controller {

    public function __construct() {
        parent::__construct([
            'UsuariosModel'
        ]);
    }

    public function index() {
        return $this->listado();
    }

    public function listado(){
        $registros_por_pagina = 20;
        $pagina_actual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
        if ($pagina_actual < 1) {
            $pagina_actual = 1;
        }
        $resultado = UsuariosModel::consultarUsuarios($pagina_actual, $registros_por_pagina);
        $total_paginas = UsuariosModel::consultarTotalPaginas($registros_por_pagina);


        $this -> view('usuarios/listado', [
            'email_sesion' => $this->user,
            'resultado' => $resultado,
            'total_paginas' => $total_paginas,
            'pagina_actual' => $pagina_actual
        ]);
    }

    public function eliminar(){
        if(isset($_GET['id'])) {
            $cliente = UsuariosModel::consultarUsuarioByID($_GET['id']);
            if($cliente){
                UsuariosModel::eliminarUsuario($_GET['id']);
                echo "<script>
                        alert('Usuario eliminado')
                    </script>";
            }else{
                echo "<script>
                        alert('Usuario no encontrado');
                    </script>";
            }
        } else {
            echo "<script>
                    alert('ID de usuario no proporcionado');
                </script>";
        }
        echo "<script>
                window.location.href = '/usuarios/listado';
            </script>";
        exit;
    }

}