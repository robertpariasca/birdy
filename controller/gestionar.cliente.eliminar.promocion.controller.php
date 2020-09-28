<?php
    
    try {

    require_once '../logic/Promociones.class.php';
    require_once '../util/functions/Helper.class.php';

    $codpromocion      = $_POST["p_codpromocion"];


    $objUsuario = new Promocion();
    session_name("Birdy");
    session_start();
        $objUsuario->setCodproveedor($_SESSION["cod_acceso"]);
        $objUsuario->setCodpromocion($codpromocion);
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


