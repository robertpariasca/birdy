<?php

require_once '../logic/Producto.class.php';
require_once '../util/functions/Helper.class.php';

try {

    $objProducto = new Producto();
    session_name("Birdy");
    session_start();
    $resultado = $objProducto->listarTodo();
    
    Helper::imprimeJSON(200, "", $resultado);
} catch (Exception $exc) {
    Helper::imprimeJSON(500, $exc->getMessage(), "");
}

