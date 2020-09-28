<?php

require_once '../logic/Promociones.class.php';
require_once '../util/functions/Helper.class.php';

try {

    $nombretipo            = $_POST["nombre_tipo"];

    $objProducto = new Promocion();
    session_start();
    $objProducto->setCodproveedor($_SESSION["cod_acceso"]);
    $objProducto->setNombretipo($nombretipo);
    $resultadoProm = $objProducto->listarVista();
    
} catch (Exception $exc) {
    $resultadoProm = $exc;
   // Helper::imprimeJSON(500, $exc->getMessage(), "");
}

