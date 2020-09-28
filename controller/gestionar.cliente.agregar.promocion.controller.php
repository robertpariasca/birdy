<?php

try {
    
    require_once '../logic/Promociones.class.php';
    require_once '../util/functions/Helper.class.php';

    $nompromocion           = $_POST["p_nompromocion"];
    $descripcionlarga       = $_POST["p_descripcionlarga"];
    $costoreal              = $_POST["p_costoreal"];
    $descuento              = $_POST["p_descuento"];
    $costopromocion         = $_POST["p_costopromocion"];
    $fechainiciovigencia    = $_POST["p_fechainiciovigencia"];
    $fechafinvigencia       = $_POST["p_fechafinvigencia"];
    $opciones               = $_POST["p_tipopublicidad"];
    $stock                  = $_POST["p_stockpedido"];

    $objUsuario = new Promocion();
    session_name("Birdy");
    session_start();

    $objUsuario->setCodproveedor($_SESSION["cod_acceso"]);
    $objUsuario->setNompromocion($nompromocion);
    $objUsuario->setDescripcionlarga($descripcionlarga);
    $objUsuario->setCostoreal($costoreal);
    $objUsuario->setDescuento($descuento);
    $objUsuario->setCostopromocion($costopromocion);
    $objUsuario->setFechainiciovigencia($fechainiciovigencia);
    $objUsuario->setFechafinvigencia($fechafinvigencia);
    $objUsuario->setTipopublicidad($opciones);
    $objUsuario->setStockpedido($stock);
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
