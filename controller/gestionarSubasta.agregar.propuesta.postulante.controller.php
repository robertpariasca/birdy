<?php

try {
    
    require_once '../logic/PropuestaPostulantes.class.php';
    require_once '../util/functions/Helper.class.php';

    $codtipo            = $_POST["p_codtipo"];
    $nropropuesta       = $_POST["p_nropropuesta"];
    $costo              = $_POST["p_costo"];
    $detalles           = $_POST["p_detalles"];
   
    $objPropuestaPostulante = new PropuestaPostulantes();
    session_name("Birdy");
    session_start();

    $objPropuestaPostulante->setNropropuesta($nropropuesta);
    $objPropuestaPostulante->setCodpostulante($_SESSION["cod_acceso"]);
    $objPropuestaPostulante->setCostocobrado($costo);
    $objPropuestaPostulante->setDetallespropuesta($detalles);
    $resultado = $objPropuestaPostulante->agregar();


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
