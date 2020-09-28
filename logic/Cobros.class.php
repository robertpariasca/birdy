<?php

require_once '../data/Conexion.class.php';

class Cobros extends Conexion{

    private $codcobro;
    private $descripcioncobro;

    public function getCodcobro()
    {
        return $this->codcobro;
    }

    public function setCodcobro($codcobro)
    {
        $this->codcobro = $codcobro;
    }

    public function getDescripcioncobro()
    {
        return $this->descripcioncobro;
    }

    public function setDescripcioncobro($descripcioncobro)
    {
        $this->descripcioncobro = $descripcioncobro;
    }

}
