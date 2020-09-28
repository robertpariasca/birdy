<?php

require_once '../logic/Ubigeo.class.php';
require_once '../util/functions/Helper.class.php';

$CodDepartamento            = $_POST["p_coddepartamento"];

try {
    $objProvincia = new Ubigeo();
    $objProvincia->setCoddepartamento($CodDepartamento);
    $resultado = $objProvincia->listarProvincias();
    Helper::imprimeJSON(200, "", $resultado);
} catch (Exception $exc) {
    Helper::imprimeJSON(500, $exc->getMessage(), "");
}
