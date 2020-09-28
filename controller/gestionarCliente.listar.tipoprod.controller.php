<?php

require_once '../logic/Tipoproducto.class.php';
require_once '../util/functions/Helper.class.php';

try {
    $objClienteContacto = new Tipoproducto();
    $resultado = $objClienteContacto->listar();
    Helper::imprimeJSON(200, "", $resultado);
} catch (Exception $exc) {
    Helper::imprimeJSON(500, $exc->getMessage(), "");
}

