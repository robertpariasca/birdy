<?php

try {
    
    require_once '../logic/PromocionesDetalle.class.php';
    require_once '../util/functions/Helper.class.php';

    $codpromocion          = $_POST["p_codpromocion"];
    $codproducto           = $_POST["p_codproducto"];
    $nomproducto           = $_POST["p_nomproducto"];
    $cantidadproducto      = $_POST["p_cantidadproducto"];

    $objUsuario = new PromocionDetalle();
    session_name("Birdy");
    session_start();

    $objUsuario->setCodpromocion($codpromocion);
    $objUsuario->setCodproducto($codproducto);
    $objUsuario->setNomproducto($nomproducto);
    $objUsuario->setCantidadproducto($cantidadproducto);
    $resultado = $objUsuario->agregar();

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
