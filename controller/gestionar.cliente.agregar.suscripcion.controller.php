<?php

try {
    
    require_once '../logic/Plan.class.php';
    require_once '../util/functions/Helper.class.php';

    $codplanes           = $_POST["p_codplanes"];
    

    $objUsuario = new Plan();
    session_name("Birdy");
    session_start();

    $objUsuario->setCodcliente($_SESSION["cod_acceso"]);
    $objUsuario->setCodservicio($codplanes);
    $objUsuario->setTipopago("EFECTIVO");
    $objUsuario->setFechapago("05/04/2020");
   
    //$resultado = $objUsuario->agregar();

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
