<?php
    
    try {

    require_once '../logic/Flota.class.php';
    require_once '../util/functions/Helper.class.php';

    $idflota      = $_POST["p_idflota"];


    $objUsuario = new Flota();
    session_name("Birdy");
    session_start();
        $objUsuario->setIdflota($idflota);
        $resultado = $objUsuario->eliminar();

        //Helper::imprimeJSON(200, $_SESSION["cod_acceso"], "");
        
        if ($resultado == "EXITO") {
            Helper::imprimeJSON(200, "Eliminado correctamente", "");
        }else{
                Helper::imprimeJSON(200, $resultado, "");
            }
        
       
    
} catch (Exception $exc) {
    Helper::imprimeJSON(500, $exc->getMessage(), "");
}


