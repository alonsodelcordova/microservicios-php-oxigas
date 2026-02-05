<?php

class ProductosController extends Controller
{
    public function __construct() {
        parent::__construct([
            'ProductoModel'
        ]);
        $this->validarSesion();
    }

    public function index()
    {
        $registros_por_pagina = 10;
        $pagina_actual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
        if ($pagina_actual < 1) {
            $pagina_actual = 1;
        }
        $resultado = ProductoModel::consultarProductos($pagina_actual, $registros_por_pagina);
        // Calcular el número total de páginas
        $total_paginas = ProductoModel::consultarTotalPaginas($registros_por_pagina);

        echo json_encode([
            'resultado' => $resultado,
            'total_paginas' => $total_paginas,
            'pagina_actual' => $pagina_actual,
            'status' => 'success'
        ]);
    }

    public function nuevo($mensaje="") {

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $input = $this->getDataJSON();
            $nombre = $input['nombre'];
            $categoria = $input['categoria'];
            $precio = $input['precio'];
            $usuario_id = $_SESSION['id'];

            //FILE IMAGEN
            $file_img = $_FILES['imagen'];
            $url_imagen = null;
            // guardar imagen en el servidor : /public/files/
            $extension = pathinfo($file_img['name'], PATHINFO_EXTENSION);

            if (!in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) {
                echo json_encode([
                    'status' => 'error',
                    'data' => 'Error al subir la imagen'
                ]);
                exit;
            }

            $file_name = uniqid() . '.' . $extension;

            // crear carpeta si no existe
            if (!file_exists('files/')) {
                mkdir('files/', 0755, true);
            }

            $url_imagen = 'files/' . $file_name;
            //guardar archivo en carpeta

            move_uploaded_file($file_img['tmp_name'], $url_imagen);


            
            // Llamar a la función para crear el producto
            if(ProductoModel::crearProducto($nombre, $categoria, $precio, $url_imagen, $usuario_id)){
                echo json_encode([
                    'status' => 'success',
                    'data' => 'Producto creado correctamente'
                ]);
                exit;
            }
        }
        echo json_encode([
            'status' => 'error',
            'data' => 'Error al crear el producto'
        ]);

    }

    public function eliminar(){
        $id = null;
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $producto_db = ProductoModel::consultarProducto('id',$id);
            if($producto_db){
                $usuario_id = $producto_db['usuario_id'];
                if($usuario_id == $_SESSION['id']){
                    ProductoModel::eliminarProducto($id);
                    //borrar imagen
                    $url_imagen = $producto_db['url_imagen'];
                    unlink($url_imagen);
                    echo json_encode([
                        'status' => 'success',
                        'data' => 'Producto eliminado correctamente'
                    ]);
                    exit;
                }
            }
        }
        echo json_encode([
        'status' => 'error',
        'data' => 'Error al eliminar el producto'
        ]);
    }


    public function categorias(){
        $resultado = ProductoModel::consultarCategorias();
        echo json_encode([
            'status' => 'success',
            'data' => $resultado
        ]);
    }

}