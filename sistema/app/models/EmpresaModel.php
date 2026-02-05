
<?php

class EmpresaModel extends Model
{
    public static function consultarEmpresa(){
        $conexion = Database::connect();
        $resultado = $conexion->query("SELECT * FROM empresa LIMIT 1");
        return $resultado->fetch(PDO::FETCH_ASSOC);
    }

    public static function actualizarEmpresa($nombre, $ident_fiscal, $direccion, $moneda, $zona_horaria, $is_alert_inventar_bajo, $is_modo_offline){
        $conexion = Database::connect();
        $sql = "UPDATE empresa SET nombre = :nombre, ident_fiscal = :ident_fiscal, direccion = :direccion, moneda_base = :moneda, zona_horaria = :zona_horaria, is_alert_inventar_bajo = :is_alert_inventar_bajo, is_modo_offline = :is_modo_offline WHERE id = 1";
        $resultado = $conexion->prepare($sql);
        $resultado->bindValue(':nombre', $nombre, PDO::PARAM_STR);
        $resultado->bindValue(':ident_fiscal', $ident_fiscal, PDO::PARAM_STR);
        $resultado->bindValue(':direccion', $direccion, PDO::PARAM_STR);
        $resultado->bindValue(':moneda', $moneda, PDO::PARAM_STR);
        $resultado->bindValue(':zona_horaria', $zona_horaria, PDO::PARAM_STR);
        $resultado->bindValue(':is_alert_inventar_bajo', $is_alert_inventar_bajo, PDO::PARAM_INT);
        $resultado->bindValue(':is_modo_offline', $is_modo_offline, PDO::PARAM_INT);
        return $resultado->execute();
    }

    public static function consultarConfiguraciones($codigos){
        $conexion = Database::connect();
        $resultado = $conexion->query("SELECT * FROM configuracion WHERE cod_prim in ($codigos) and estado = 1");
        $resultado->execute();
        return $resultado->fetchAll(PDO::FETCH_ASSOC);
    }

}