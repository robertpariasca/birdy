<?php

try {

    require_once '../logic/Producto.class.php';
    require_once '../util/functions/Helper.class.php';

    $nombreproducto   = $_POST["p_nombreproducto"];
    $tipoproducto     = $_POST["p_tipoproducto"];

    $objUsuario = new Producto();
    session_name("Birdy");
    session_start();

    $objUsuario->setCodproveedor($_SESSION["cod_acceso"]);
    $objUsuario->setNomproducto($nombreproducto);
    $objUsuario->setTipoproducto($tipoproducto);
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
