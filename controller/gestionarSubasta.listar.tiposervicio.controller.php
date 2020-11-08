<?php

require_once '../logic/TipoServicio.class.php';
require_once '../util/functions/Helper.class.php';

try {
    $objTipoServicio = new TipoServicio();
    $resultado = $objTipoServicio->listar();
} catch (Exception $exc) {
    Helper::imprimeJSON(500, $exc->getMessage(), "");
}

