<?php

try {
    
    require_once '../logic/PropuestaContrato.class.php';
    require_once '../util/functions/Helper.class.php';

    $NroPropuestaPostulante        = $_POST["p_nropostulantepropuesta"];

    $objPropuestaContrato = new PropuestaContrato();
    session_name("Birdy");
    session_start();

    $objPropuestaContrato->setIdpostulantepropuesta($NroPropuestaPostulante);
    $resultado = $objPropuestaContrato->listar();

    $NroPropuesta = $resultado[0]["nro_propuesta"];
    $CodSolicitante = $resultado[0]["cod_solicitante"];
    $CodPostulante = $resultado[0]["cod_postulante"];
    $FechaContrato = $resultado[0]["fecha_contrato"];
    $CostoCobrado = $resultado[0]["costo_cobrado"];

    $objPropuestaContrato->setIdpropuesta($NroPropuesta);
    $objPropuestaContrato->setCodsolicitante($CodSolicitante);
    $objPropuestaContrato->setCodproveedor($CodPostulante);
    $objPropuestaContrato->setFechacontrato($FechaContrato);
    $objPropuestaContrato->setCosto($CostoCobrado);
    $objPropuestaContrato->setComision("0.00");
    $resultado2 = $objPropuestaContrato->agregar();

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
