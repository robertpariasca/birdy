<?php

require_once '../logic/Usuario.class.php';
require_once '../util/functions/Helper.class.php';

try {
    $objCliente= new Usuario();
    session_name("Birdy");
    session_start();
    $objCliente->setCodcliente($_SESSION["cod_acceso"]);
    $resultado = $objCliente->listar();
    Helper::imprimeJSON(200, "", $resultado);
} catch (Exception $exc) {
    Helper::imprimeJSON(500, $exc->getMessage(), "");
}

