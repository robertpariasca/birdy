<?php

require_once '../logic/ContratoCoordenadas.class.php';
require_once '../util/functions/Helper.class.php';

$idcontrato      = $_POST["p_idcontrato"];

try {
    $objSede = new ContratoCoordenadas();
    session_name("Birdy");
    session_start();
    $objSede->setIdcontrato($idcontrato);    
    $resultado = $objSede->listar();
    Helper::imprimeJSON(200, "", $resultado);
} catch (Exception $exc) {
    Helper::imprimeJSON(500, $exc->getMessage(), "");
}
