<?php

class PedidoModel extends Model {

    public static function consultarPedidos($pagina, $registros_por_pagina){
        $offset = ($pagina - 1) * $registros_por_pagina;
        $conexion = Database::connect();
        $sql = "SELECT p.id, p.cliente_id, p.total, p.fecha_registro,
            concat(c.nombre, ' ', c.apellido) as cliente
            FROM pedidos p 
            INNER JOIN clientes c ON p.cliente_id = c.id
            LIMIT :limit OFFSET :offset";
        $resultado = $conexion->prepare($sql);
        $resultado->bindValue(':limit', $registros_por_pagina, PDO::PARAM_INT);
        $resultado->bindValue(':offset', $offset, PDO::PARAM_INT);
        $resultado->execute();
        return $resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function consultarTotalPaginas($registros_por_pagina){
        $conexion = Database::connect();
        $sql = "SELECT COUNT(*) AS total FROM pedidos";
        $resultado = $conexion->query($sql);
        $total_registros = $resultado->fetch(PDO::FETCH_ASSOC)['total'];
        return ceil($total_registros / $registros_por_pagina);
    }

    public static function crearPedido($cliente_id, $total){
        $conexion = Database::connect();
        $sql = "INSERT INTO pedidos (cliente_id, fecha_registro) VALUES (:cliente_id, :total)";
        $resultado = $conexion->prepare($sql);
        $resultado->bindValue(':cliente_id', $cliente_id, PDO::PARAM_INT);
        return $resultado->execute();
    }

    public static function insertarDetallePedido($pedido_id, $producto_id, $cantidad, $precio){
        $conexion = Database::connect();
        $out_id = null;
        try{ 
            $sql = "CALL insertarDetallePedido(:pedido_id, :producto_id, :cantidad, :precio, :out_id)";
            $resultado = $conexion->prepare($sql);
            $resultado->bindValue(':pedido_id', $pedido_id, PDO::PARAM_INT);
            $resultado->bindValue(':producto_id', $producto_id, PDO::PARAM_INT);
            $resultado->bindValue(':cantidad', $cantidad, PDO::PARAM_INT);
            $resultado->bindValue(':precio', $precio, PDO::PARAM_STR);
            $resultado->bindParam(':out_id', $out_id, PDO::PARAM_INT);
            $resultado->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $out_id;
    }

}