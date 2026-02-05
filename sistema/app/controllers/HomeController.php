<?php

class HomeController extends Controller
{
    public function __construct() {
        parent::__construct([
            'EmpresaModel'
        ]);
    }

    public function infoEmpresa(){
        $empresa = EmpresaModel::consultarEmpresa();
        echo json_encode(
            [
                'nombre' => $empresa['nombre'],
                'ident_fiscal' => $empresa['ident_fiscal'],
                'direccion' => $empresa['direccion'],
                'moneda' => $empresa['moneda_base'],
                'zona_horaria' => $empresa['zona_horaria'],
                'is_alert_inventar_bajo' => $empresa['is_alert_inventar_bajo'],
                'is_modo_offline' => $empresa['is_modo_offline']
            ]
        );
    }

    public function actualizarEmpresa(){
        if($_SERVER['REQUEST_METHOD'] == 'PUT'){
            $input = $this->getDataJSON();
            $nombre = $input['nombre'];
            $ident_fiscal = $input['ident_fiscal'];
            $direccion = $input['direccion'];
            $moneda = $input['moneda'];
            $zona_horaria = $input['zona_horaria'];
            $is_alert_inventar_bajo = $input['is_alert_inventar_bajo'];
            $is_modo_offline = $input['is_modo_offline'];
            
            $resultado = EmpresaModel::actualizarEmpresa($nombre, $ident_fiscal, $direccion, $moneda, $zona_horaria, $is_alert_inventar_bajo, $is_modo_offline);
            echo json_encode([
                'status' => 'success',
                'data' => 'Empresa actualizada correctamente'
            ]);
        }
    }

     public function consultarConfiguraciones(){
        // codigo de configuracion
        if (!isset($_GET['codigos'])) {
             echo json_encode([
                'status' => 'error',
                'data' => 'Codigo de configuracion no valido'
            ]);
            exit;
        }
        $codigos = $_GET['codigos'];
        // codigos viene en un array
        $resultado = EmpresaModel::consultarConfiguraciones($codigos);
        echo json_encode([
            'status' => 'success',
            'data' => $resultado
        ]);
    }

}
