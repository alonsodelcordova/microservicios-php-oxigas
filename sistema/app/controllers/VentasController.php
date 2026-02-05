
<?php

class VentasController extends Controller
{
    public function __construct()
    {
        parent::__construct([
            'ProductoModel'
        ]);
        $this->validarSesion();
    }

    public function index(){
        $this -> view('ventas/index');
    }

    public function nuevo()
    {
        $registros_por_pagina = 10;
        $pagina_actual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
        if ($pagina_actual < 1) {
            $pagina_actual = 1;
        }
        //$ventas = ProductoModel::consultarVentas($pagina_actual, $registros_por_pagina);
        // Calcular el número total de páginas
        //$total_paginas = ProductoModel::consultarTotalPaginas($registros_por_pagina);

        echo json_encode([
            'resultado' => [],
            'total_paginas' => 1,
            'pagina_actual' => $pagina_actual,
            'status' => 'success'
        ]);
    }
}