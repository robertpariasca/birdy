<?php

require_once '../logic/Contacto.class.php';
require_once '../util/functions/Helper.class.php';

try {
    $objClienteContacto = new Contacto();
    session_name("Birdy");
    session_start();
    $objClienteContacto->setCodcliente($_SESSION["cod_acceso"]);
    $resultado = $objClienteContacto->listarContacto();
    Helper::imprimeJSON(200, "", $resultado);
} catch (Exception $exc) {
    Helper::imprimeJSON(500, $exc->getMessage(), "");
}

