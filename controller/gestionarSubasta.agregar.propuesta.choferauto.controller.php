<?php

try {
    
    require_once '../logic/PropuestaPostulantesDetalle.class.php';
    require_once '../util/functions/Helper.class.php';

    $idpostulantepropuesta      = $_POST["p_idpostulantepropuesta"];
    $idconductor                = $_POST["p_idconductor"];
    $nomchofer                  = $_POST["p_nomchofer"];
    $idauto                     = $_POST["p_idauto"];
    $placaauto                  = $_POST["p_placaauto"];
   
    $objPropuestaPostulante = new PropuestaPostulantesDetalle();
    session_name("Birdy");
    session_start();

    $objPropuestaPostulante->setIdpostulantepropuesta($idpostulantepropuesta);
    $objPropuestaPostulante->setIdchofer($idconductor);
    $objPropuestaPostulante->setNomchofer($nomchofer);
    $objPropuestaPostulante->setIdauto($idauto);
    $objPropuestaPostulante->setPlacaauto($placaauto);
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
