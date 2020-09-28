<?php
    
    try {

    require_once '../logic/Conductor.class.php';
    require_once '../util/functions/Helper.class.php';

    $idconductor      = $_POST["p_idconductor"];


    $objUsuario = new Conductor();
    session_name("Birdy");
    session_start();
        $objUsuario->setIdconductor($idconductor);
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


