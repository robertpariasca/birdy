<?php

try {

    session_name("Birdy");
    session_start();
    $nropropuesta      = $_POST["p_nropropuesta"];
    $_SESSION["nro_propuesta"] = $nropropuesta;

} catch (Exception $exc) {
    Helper::imprimeJSON(500, $exc->getMessage(), "");
}