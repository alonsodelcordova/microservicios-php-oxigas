<?php

class UsuariosController extends Controller {

    public function __construct() {
        parent::__construct([
            'UsuariosModel'
        ]);
        $this->validarSesion();
    }

    public function index() {
        return $this->listado();
    }

    public function listado(){
        $registros_por_pagina = 10;
        $pagina_actual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
        if ($pagina_actual < 1) {
            $pagina_actual = 1;
        }
        $resultado = UsuariosModel::consultarUsuarios($pagina_actual, $registros_por_pagina);
        $total_paginas = UsuariosModel::consultarTotalPaginas($registros_por_pagina);


        echo json_encode([
            'resultado' => $resultado,
            'total_paginas' => $total_paginas,
            'pagina_actual' => $pagina_actual,
            'status' => 'success'
        ]);
    }

    public function eliminar(){
        if(isset($_GET['id'])) {
            $cliente = UsuariosModel::consultarUsuarioByID($_GET['id']);
            if($cliente){
                UsuariosModel::eliminarUsuario($_GET['id']);
                echo json_encode([
                    'status' => 'success',
                    'data' => 'Usuario eliminado correctamente'
                ]);
                exit;
            }
        } 
        echo json_encode([
            'status' => 'error',
            'data' => 'Error al eliminar el usuario'
        ]);
        exit;
    }

}