<?php

require_once '../logic/Conductor.class.php';
require_once '../util/functions/Helper.class.php';

try {
    $objClienteContacto = new Conductor();
    session_name("Birdy");
    session_start();
    $objClienteContacto->setCodproveedor($_SESSION["cod_acceso"]);
    $resultado = $objClienteContacto->listarConductor();
    Helper::imprimeJSON(200, "", $resultado);
} catch (Exception $exc) {
    Helper::imprimeJSON(500, $exc->getMessage(), "");
}

