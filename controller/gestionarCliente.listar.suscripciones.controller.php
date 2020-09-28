<?php

require_once '../logic/Plan.class.php';
require_once '../util/functions/Helper.class.php';

try {

    $objProducto = new Plan();
    session_name("Birdy");
    session_start();
    $objProducto->setCodcliente($_SESSION["cod_acceso"]);
    $resultado = $objProducto->listar();
    
    Helper::imprimeJSON(200, "", $resultado);
} catch (Exception $exc) {
    Helper::imprimeJSON(500, $exc->getMessage(), "");
}

