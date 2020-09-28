<?php

try {

    require_once '../logic/Usuario.class.php';
    require_once '../util/functions/Helper.class.php';

    if (
        !isset($_POST["p_dni"]) ||
        empty($_POST["p_dni"]) ||

        !isset($_POST["p_nombreCompleto"]) ||
        empty($_POST["p_nombreCompleto"]) ||

        !isset($_POST["p_usuario"]) ||
        empty($_POST["p_usuario"]) ||

        !isset($_POST["p_password"]) ||
        empty($_POST["p_password"])

    ) {
        Helper::imprimeJSON(500, "Falta completar datos", "");
        exit();
    }
    $TipoDoc            = $_POST["p_tipodoc"];
    $Dni                = $_POST["p_dni"];
    $NombresCompleto    = $_POST["p_nombreCompleto"];
    $Usuario            = $_POST["p_usuario"];
    $Password           = $_POST["p_password"];

    $objUsuario = new Usuario();

    $objUsuario->setTipodoccliente($TipoDoc);
    $objUsuario->setDoccliente($Dni);
    $objUsuario->setNomcliente($NombresCompleto);
    $objUsuario->setRol('1');
    $objUsuario->setAlias($Usuario);
    $objUsuario->setClave($Password);
    $resultado = $objUsuario->agregar();
    /*
        echo '<pre>';
        echo 'Datos que llegan por POST';
        print_r($resultado);
        echo '</pre>';
*/
    if ($resultado == "EXITO") {
        Helper::imprimeJSON(200, "Agregado correctamente", "");
    } else {
        Helper::imprimeJSON(200, $resultado, "");
    }
} catch (Exception $exc) {
    Helper::imprimeJSON(500, $exc->getMessage(), "");
}
