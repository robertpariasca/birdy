<?php
    
    try {

    require_once '../logic/Usuario.class.php';
    require_once '../util/functions/Helper.class.php';

    if
    (
            !isset($_POST["p_dni"]) ||
            empty($_POST["p_dni"]) ||
            
            !isset($_POST["p_nombreCompleto"]) ||
            empty($_POST["p_nombreCompleto"]) 
            
    ) 
        {
        Helper::imprimeJSON(500, "Falta completar datos", "");
        exit();
    }
    $TipoDoc            = $_POST["p_tipodoc"];
    $Dni                = $_POST["p_dni"];
    $NombresCompleto    = $_POST["p_nombreCompleto"];

    $objUsuario = new Usuario();
    session_name("Birdy");
    session_start();
        $objUsuario->setCodcliente($_SESSION["cod_acceso"]);
        $objUsuario->setTipodoccliente($TipoDoc);
        $objUsuario->setDoccliente($Dni);
        $objUsuario->setNomcliente($NombresCompleto);

        $resultado = $objUsuario->actualizar();
/*
        echo '<pre>';
        echo 'Datos que llegan por POST';
        print_r($resultado);
        echo '</pre>';
*/
        if ($resultado == "EXITO") {
            Helper::imprimeJSON(200, "Agregado correctamente", "");
        }else{
                Helper::imprimeJSON(200, $resultado, "");
            }
            
       
    
} catch (Exception $exc) {
    Helper::imprimeJSON(500, $exc->getMessage(), "");
}


