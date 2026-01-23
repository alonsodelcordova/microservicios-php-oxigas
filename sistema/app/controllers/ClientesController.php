<?php


class ClientesController extends Controller {

    public function __construct() {
        parent::__construct([
            'ClienteModel'
        ]);
    }

    public function index() {
        // Número de registros por página
        $registros_por_pagina = 20;

        // Obtener el número de página actual desde la URL
        $pagina_actual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
        if ($pagina_actual < 1) {
            $pagina_actual = 1;
        }
        $resultado = ClienteModel::consultarClientes($pagina_actual, $registros_por_pagina);
        // Calcular el número total de páginas
        $total_paginas = ClienteModel::consultarTotalPaginas($registros_por_pagina);

        $this -> view('clientes/index', [
            'resultado' => $resultado,
            'total_paginas' => $total_paginas,
            'pagina_actual' => $pagina_actual
        ]);
    }

    public function nuevo($mensaje="") {
        $this -> view('clientes/nuevo',[
            'mensaje' => $mensaje
        ]);
    }

    public function registrar(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Obtener los datos del formulario
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $email = $_POST['email'];
            $telefono = $_POST['telefono'];
            
            
            // Llamar a la función para crear el cliente
            if(ClienteModel::crearCliente($nombre, $apellido, $email, $telefono)){
                echo "<script>
                alert('Cliente creado correctamente');
                window.location.href = '/clientes';
                </script>";
            
            }else{
                $mensaje = "Error al crear el cliente";
            }
        }
    }


    public function eliminar(){
        if(isset($_GET['id'])){
            $cliente = ClienteModel::consultarCliente($_GET['id']);
            if($cliente){
                ClienteModel::eliminarCliente($_GET['id']);
                echo "<script>
                        alert('Cliente eliminado');
                    </script>";
            }else{
                echo "<script>
                        alert('Cliente no encontrado');
                    </script>";
            }
        }else{
            echo "<script>
                    alert('ID de cliente no proporcionado');
                </script>";
        }
        echo "<script>
                window.location.href = '/clientes';
            </script>";
        exit;
    }

}
