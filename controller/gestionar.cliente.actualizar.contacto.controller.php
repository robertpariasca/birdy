<?php
    
    try {

    require_once '../logic/Contacto.class.php';
    require_once '../util/functions/Helper.class.php';

    $documento          = $_POST["p_documento"];
    $nombre             = $_POST["p_nombre"];
    $cargo              = $_POST["p_cargo"];
    $direccion          = $_POST["p_direccion"];
    $celular            = $_POST["p_celular"];
    $correo             = $_POST["p_correo"];
    $coddepartamento    = $_POST["p_coddepartamento"];
    $codprovincia       = $_POST["p_codprovincia"];
    $coddistrito        = $_POST["p_coddistrito"];

    $objUsuario = new Contacto();
    session_name("Birdy");
    session_start();
        $objUsuario->setCodcliente($_SESSION["cod_acceso"]);
        $objUsuario->setDocumento($documento);
        $objUsuario->setNomcontacto($nombre);
        $objUsuario->setCargocontacto($cargo);
        $objUsuario->setDireccion($direccion);
        $objUsuario->setCelular($celular);
        $objUsuario->setCorreo($correo);
        $objUsuario->setCoddepartamento($coddepartamento);
        $objUsuario->setCodprovincia($codprovincia);
        $objUsuario->setCoddistrito($coddistrito);
        $resultado = $objUsuario->agregar();

        //Helper::imprimeJSON(200, $_SESSION["cod_acceso"], "");
        
        if ($resultado == "EXITO") {
            Helper::imprimeJSON(200, "Agregado correctamente", "");
        }else{
                Helper::imprimeJSON(200, $resultado, "");
            }
        
       
    
} catch (Exception $exc) {
    Helper::imprimeJSON(500, $exc->getMessage(), "");
}


