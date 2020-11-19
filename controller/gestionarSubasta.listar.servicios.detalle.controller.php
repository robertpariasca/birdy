<?php

require_once '../logic/PropuestaDetalle.class.php';
require_once '../util/functions/Helper.class.php';

try {

    $nropropuesta            = $_POST["nro_propuesta"];

    $objProducto = new PropuestaDetalle();
    session_start();
    $objProducto->setNropropuesta($nropropuesta);
    $resultadoSubastaDetalle = $objProducto->listarDetallado();
    
} catch (Exception $exc) {
    $resultadoSubastaDetalle = $exc;
   // Helper::imprimeJSON(500, $exc->getMessage(), "");
}

