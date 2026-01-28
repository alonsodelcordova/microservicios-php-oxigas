<?php

class PedidosController extends Controller
{

    public function __construct(){
        parent::__construct([
            'PedidoModel'
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
        $resultado = PedidoModel::consultarPedidos($pagina_actual, $registros_por_pagina);
        // Calcular el número total de páginas
        $total_paginas = PedidoModel::consultarTotalPaginas($registros_por_pagina);

        $this -> view('pedidos/index', [
            'resultado' => $resultado,
            'total_paginas' => $total_paginas,
            'pagina_actual' => $pagina_actual
        ]);
    }

    public function nuevo()
    {
        $this -> view('pedidos/nuevo');
    }
}
