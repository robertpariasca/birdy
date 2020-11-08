<?php

try {
    
    require_once '../logic/PropuestaDetalleProducto.class.php';
    require_once '../util/functions/Helper.class.php';

    $codpropuesta           = $_POST["p_codpropuesta"];
    $codproducto            = $_POST["p_codproducto"];
    $nomproducto            = $_POST["p_nomproducto"];
    $cantidadproducto       = $_POST["p_cantidadproducto"];
   
    $objPropuestaProducto = new PropuestaDetalleProducto();
    session_name("Birdy");
    session_start();

    $objPropuestaProducto->setNropropuesta($codpropuesta);
    $objPropuestaProducto->setCodproducto($codproducto);
    $objPropuestaProducto->setNomproducto($nomproducto);
    $objPropuestaProducto->setCantidadproducto($cantidadproducto);
    $resultado = $objPropuestaProducto->agregar();


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
