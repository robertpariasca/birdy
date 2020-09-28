<?php

try {

    require_once '../logic/Flota.class.php';
    require_once '../util/functions/Helper.class.php';

    $tipovehiculo   = $_POST["p_tipovehiculo"];
    $capacidad      = $_POST["p_capacidad"];
    $placa          = $_POST["p_placa"];
    $gps            = $_POST["p_gps"];

    $objUsuario = new Flota();
    session_name("Birdy");
    session_start();

    $direccion_subida = "../view/fotos/flota/";
    $nombre_archivo_subir = $direccion_subida . $_SESSION["cod_acceso"] . "-" . $placa .".png";

    $objUsuario->setCodproveedor($_SESSION["cod_acceso"]);
    $objUsuario->setTipovehiculo($tipovehiculo);
    $objUsuario->setCapacidadkg($capacidad);
    $objUsuario->setPlaca($placa);
    $objUsuario->setGps($gps);
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
