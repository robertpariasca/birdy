<?php

require_once '../logic/Propuesta.class.php';
require_once '../util/functions/Helper.class.php';

try {
    $objSede = new Propuesta();
    session_name("Birdy");
    session_start();
    $objSede->setCodsolicitante($_SESSION["cod_acceso"]);
    $resultado = $objSede->listar();
    Helper::imprimeJSON(200, "", $resultado);
} catch (Exception $exc) {
    Helper::imprimeJSON(500, $exc->getMessage(), "");
}

