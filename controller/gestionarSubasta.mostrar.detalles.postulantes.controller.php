<?php

try {
    
    require_once '../logic/PropuestaPostulantes.class.php';
    require_once '../util/functions/Helper.class.php';    
   
    $objPropuestaPostulante = new PropuestaPostulantes();
    session_name("Birdy");
    session_start();
    $nropropuesta= $_SESSION["nro_propuesta"];
    $objPropuestaPostulante->setNropropuesta($nropropuesta);
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
