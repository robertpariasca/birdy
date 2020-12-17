<?php

try {
    
    require_once '../logic/ContratoCabecera.class.php';
    require_once '../util/functions/Helper.class.php';

    $idContrato                 = $_POST["p_contrato"];
    $calificacion               = $_POST["p_calificacion"];
    $comentario                 = $_POST["p_comentario"];
   
    $objContratoCabecera = new ContratoCabecera();
    session_name("Birdy");
    session_start();

    $objContratoCabecera->setIdcontrato($idContrato);
    $objContratoCabecera->setCalificacion($calificacion);
    $objContratoCabecera->setComentario($comentario);
    $resultado = $objContratoCabecera->actualizar();


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
