<?php

try {
    
    require_once '../logic/PromocionesZonas.class.php';
    require_once '../util/functions/Helper.class.php';

    $codpromocion          = $_POST["p_codpromocion"];
    $coddepartamento       = $_POST["p_coddepartamento"];
    $codprovincia          = $_POST["p_codprovincia"];
    $coddistrito           = $_POST["p_coddistrito"];

    $objUsuario = new PromocionZona();
    session_name("Birdy");
    session_start();

    $objUsuario->setCodpromocion($codpromocion);
    $objUsuario->setCoddepartamento($coddepartamento);
    $objUsuario->setCodprovincia($codprovincia);
    $objUsuario->setCoddistrito($coddistrito);
    $resultado = $objUsuario->eliminar();

    Helper::imprimeJSON(200, "Eliminado correctamente", $resultado);

    /*
    if ($resultado == "EXITO") {
        Helper::imprimeJSON(200, "Agregado correctamente", $resultado);
    } else {
        Helper::imprimeJSON(200, $resultado, "");
    }
*/
    //Helper::imprimeJSON(200, $prueba, $prueba);


} catch (Exception $exc) {
    Helper::imprimeJSON(500, $exc->getMessage(), "");
}
