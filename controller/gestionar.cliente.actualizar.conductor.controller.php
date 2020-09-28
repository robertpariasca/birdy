<?php

try {

    require_once '../logic/Conductor.class.php';
    require_once '../util/functions/Helper.class.php';

    $NroDocConductor    = $_POST["p_nrodocconductor"];
    $NomConductor       = $_POST["p_nomconductor"];
    $NroLicencia        = $_POST["p_nrolicencia"];
    $Telefono           = $_POST["p_telefono"];

    $objUsuario = new Conductor();
    session_name("Birdy");
    session_start();

    $direccion_subida = "../view/fotos/conductor/";
    $nombre_archivo_subir = $direccion_subida . $_SESSION["cod_acceso"] . "-" . $NroDocConductor .".png";

    $objUsuario->setCodproveedor($_SESSION["cod_acceso"]);
    $objUsuario->setNrodoc($NroDocConductor);
    $objUsuario->setNombre($NomConductor);
    $objUsuario->setNrolicencia($NroLicencia);
    $objUsuario->setNumtelefono($Telefono);
    $objUsuario->setImagen($nombre_archivo_subir);
    $resultado = $objUsuario->agregar();

   
    if ($resultado == "EXITO") {
        Helper::imprimeJSON(200, "Agregado correctamente", "");
    } else {
        Helper::imprimeJSON(200, $resultado, "");
    }

    //Helper::imprimeJSON(200, $prueba, $prueba);


} catch (Exception $exc) {
    Helper::imprimeJSON(500, $exc->getMessage(), "");
}
