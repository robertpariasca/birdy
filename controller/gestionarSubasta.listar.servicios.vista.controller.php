<?php

require_once '../logic/Propuesta.class.php';
require_once '../util/functions/Helper.class.php';

try {

    $codigotipo            = $_POST["codigo_tipo"];

    $objProducto = new Propuesta();

    $nropropuesta= $_SESSION["cod_acceso"];
    $objProducto->setCodpostulante($nropropuesta);
    $objProducto->setTiposubasta($codigotipo);
    $resultadoSubasta = $objProducto->listarVista();
    
} catch (Exception $exc) {
    $resultadoSubasta = $exc;
   // Helper::imprimeJSON(500, $exc->getMessage(), "");
}

