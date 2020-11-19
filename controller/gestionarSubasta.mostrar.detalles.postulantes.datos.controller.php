<?php

try {
    
    require_once '../logic/PropuestaPostulantesDetalle.class.php';
    require_once '../util/functions/Helper.class.php';    
   
    $nropropuesta      = $_POST["p_nropropuesta"];

    $objPropuestaPostulante = new PropuestaPostulantesDetalle();
    session_name("Birdy");
    session_start();

    $objPropuestaPostulante->setIdpostulantepropuesta($nropropuesta);
    $resultado = $objPropuestaPostulante->listar();


    Helper::imprimeJSON(200, "Agregado correctamente", $resultado);

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
