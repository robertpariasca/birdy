<?php

require_once '../logic/Promociones.class.php';
require_once '../util/functions/Helper.class.php';

try {

    $objProducto = new Promocion();
    session_name("Birdy");
    session_start();
    $objProducto->setCodproveedor($_SESSION["cod_acceso"]);
    $resultado = $objProducto->listar();
    
    Helper::imprimeJSON(200, "", $resultado);
} catch (Exception $exc) {
    Helper::imprimeJSON(500, $exc->getMessage(), "");
}

