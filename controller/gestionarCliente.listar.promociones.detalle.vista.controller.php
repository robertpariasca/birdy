<?php

require_once '../logic/PromocionesDetalle.class.php';
require_once '../util/functions/Helper.class.php';

try {

    $codpromocion   = $_POST["p_codpromocion"];

    $objProducto = new PromocionDetalle();

    $objProducto->setCodpromocion($codpromocion);
    $resultadoDetalle = $objProducto->listarEdicion();
    
   
} catch (Exception $exc) {
    $reslultado = $exc;
}

