<?php

require_once '../logic/ContratoCabecera.class.php';
require_once '../util/functions/Helper.class.php';

try {
    $objSede = new ContratoCabecera();
    session_name("Birdy");
    session_start();
    $resultado = $objSede->listar();
    Helper::imprimeJSON(200, "", $resultado);
} catch (Exception $exc) {
    Helper::imprimeJSON(500, $exc->getMessage(), "");
}

