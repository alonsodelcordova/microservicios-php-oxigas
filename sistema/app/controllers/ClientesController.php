<?php


class ClientesController extends Controller {

    public function __construct() {
        parent::__construct([
            'ClienteModel'
        ]);
        $this->validarSesion();
    }

    public function index() {
        // Número de registros por página
        $registros_por_pagina = 10;

        // Obtener el número de página actual desde la URL
        $pagina_actual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
        if ($pagina_actual < 1) {
            $pagina_actual = 1;
        }
        $resultado = ClienteModel::consultarClientes($pagina_actual, $registros_por_pagina);
        // Calcular el número total de páginas
        $total_paginas = ClienteModel::consultarTotalPaginas($registros_por_pagina);

        echo json_encode([
            'resultado' => $resultado,
            'total_paginas' => $total_paginas,
            'pagina_actual' => $pagina_actual,
            'status' => 'success'
        ]);
    }


    public function registrar(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Obtener los datos del formulario
            $input = $this->getDataJSON();
            $nombre = $input['nombre'];
            $apellido = $input['apellido'];
            $email = $input['email'];
            $telefono = $input['telefono'];
            
            
            // Llamar a la función para crear el cliente
            if(ClienteModel::crearCliente($nombre, $apellido, $email, $telefono)){
                echo json_encode([
                    'status' => 'success',
                    'data' => 'Cliente creado correctamente'
                ]);
            
            }else{
                echo json_encode([
                    'status' => 'error',
                    'data' => 'Error al crear el cliente'
                ]);
            }
        }
    }


    public function eliminar(){
        if(isset($_GET['id'])){
            $cliente = ClienteModel::consultarCliente($_GET['id']);
            if($cliente){
                ClienteModel::eliminarCliente($_GET['id']);
                echo json_encode([
                    'status' => 'success',
                    'data' => 'Cliente eliminado correctamente'
                ]);
                exit;
            }
        }
        echo json_encode([
            'status' => 'error',
            'data' => 'Error al eliminar el cliente'
        ]);
        
    }

}
