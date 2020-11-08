<?php

try {
    
    require_once '../logic/Propuesta.class.php';
    require_once '../logic/PropuestaDetalle.class.php';
    require_once '../util/functions/Helper.class.php';

    $tiposubasta            = $_POST["p_tiposubasta"];
    $fechacierre            = $_POST["p_fechacierre"];
    $observaciones          = $_POST["p_observaciones"];
    $volumen                = $_POST["p_volumen"];
    $dimension              = $_POST["p_dimension"];
    $peso                   = $_POST["p_peso"];
    $caracteristicas        = $_POST["p_caracteristicas"];
    $departamentoSalida     = $_POST["p_departamentoSalida"];
    $provinciaSalida        = $_POST["p_provinciaSalida"];
    $distritoSalida         = $_POST["p_distritoSalida"];
    $direccionSalida        = $_POST["p_direccionSalida"];
    $fechaSalida            = $_POST["p_fechaSalida"];
    $horaSalida             = $_POST["p_horaSalida"];
    $departamentoLlegada    = $_POST["p_departamentoLlegada"];
    $provinciaLlegada       = $_POST["p_provinciaLlegada"];
    $distritoLlegada        = $_POST["p_distritoLlegada"];
    $direccionLlegada       = $_POST["p_direccionLlegada"];
    $fechaLlegada           = $_POST["p_fechaLlegada"];
    $horaLlegada            = $_POST["p_horaLlegada"];
    $NroPropuesta           = "";



    $objPropuesta = new Propuesta();
    $objPropuestaDetalle = new PropuestaDetalle();
    session_name("Birdy");
    session_start();

    $objPropuesta->setCodsolicitante($_SESSION["cod_acceso"]);
    $objPropuesta->setTiposubasta($tiposubasta);
    $objPropuesta->setFechaCierre($fechacierre);
    $objPropuesta->setObservaciones($observaciones);
    $resultado = $objPropuesta->agregar();

    $NroPropuesta = $resultado[0]["codpropuesta"];

    $objPropuestaDetalle->setNropropuesta($NroPropuesta);
    $objPropuestaDetalle->setVolumen($volumen);
    $objPropuestaDetalle->setDimensiones($dimension);
    $objPropuestaDetalle->setPeso($peso);
    $objPropuestaDetalle->setCaracteristicas($caracteristicas);
    $objPropuestaDetalle->setDepartamentosalida($departamentoSalida);
    $objPropuestaDetalle->setProvinciasalida($provinciaSalida);
    $objPropuestaDetalle->setDistritosalida($distritoSalida);
    $objPropuestaDetalle->setDireccionsalida($direccionSalida);
    $objPropuestaDetalle->setFechasalida($fechaSalida);
    $objPropuestaDetalle->setHorasalida($horaSalida);
    $objPropuestaDetalle->setDepartamentollegada($departamentoLlegada);
    $objPropuestaDetalle->setProvinciallegada($provinciaLlegada);
    $objPropuestaDetalle->setDistritollegada($distritoLlegada);
    $objPropuestaDetalle->setDireccionllegada($direccionLlegada);
    $objPropuestaDetalle->setFechallegada($fechaLlegada);
    $objPropuestaDetalle->setHorallegada($horaLlegada);
    $objPropuestaDetalle->setDetalles("");
    $resultado2 = $objPropuestaDetalle->agregar();

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
