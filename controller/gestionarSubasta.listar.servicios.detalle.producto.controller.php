<?php

require_once '../logic/PropuestaDetalleProducto.class.php';
require_once '../util/functions/Helper.class.php';

try {

    $nropropuesta            = $_POST["nro_propuesta"];

    $objProducto = new PropuestaDetalleProducto();
    session_start();
    $objProducto->setNropropuesta($nropropuesta);
    $resultadoSubastaDetalleProducto = $objProducto->listarDetalladoProducto();
    
} catch (Exception $exc) {
    $resultadoSubastaDetalleProducto = $exc;
   // Helper::imprimeJSON(500, $exc->getMessage(), "");
}

