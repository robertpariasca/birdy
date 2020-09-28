<?php

require_once '../logic/DetallesCobro.class.php';
require_once '../util/functions/Helper.class.php';

try {
    $objDetalleCobro = new DetallesCobros();
    $objDetalleCobro->setCodcobro("02");
    $resultado = $objDetalleCobro->listar();
    Helper::imprimeJSON(200, "", $resultado);
} catch (Exception $exc) {
    Helper::imprimeJSON(500, $exc->getMessage(), "");
}
