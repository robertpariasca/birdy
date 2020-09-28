<?php

try {

    require_once '../logic/Zona.class.php';
    require_once '../util/functions/Helper.class.php';

    $coddepartamento   = $_POST["p_coddepartamento"];
    $codprovincia      = $_POST["p_codprovincia"];
    $coddistrito       = $_POST["p_coddistrito"];

    $objUsuario = new Zona();
    session_name("Birdy");
    session_start();

    $objUsuario->setCodproveedor($_SESSION["cod_acceso"]);
    $objUsuario->setCoddepartamento($coddepartamento);
    $objUsuario->setCodprovincia($codprovincia);
    $objUsuario->setCoddistrito($coddistrito);
    $resultado = $objUsuario->agregar();

   
    if ($resultado == "EXITO") {
        Helper::imprimeJSON(200, "Agregado correctamente", "");
    } else {
        Helper::imprimeJSON(200, $resultado, "");
    }

    //Helper::imprimeJSON(200, $prueba, $prueba);


} catch (Exception $exc) {
    Helper::imprimeJSON(500, $exc->getMessage(), "");
}
