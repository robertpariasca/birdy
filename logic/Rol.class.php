<?php

require_once '../data/Conexion.class.php';

class Rol extends Conexion{

    private $idrol;
    private $nomrol;
    private $tiporol;
    private $linkacceso;

    public function getIdrol()
    {
        return $this->idrol;
    }

    public function setIdrol($idrol)
    {
        $this->idrol = $idrol;
    }

    public function getNomrol()
    {
        return $this->nomrol;
    }

    public function setNomrol($nomrol)
    {
        $this->nomrol = $nomrol;
    }

    public function getTiporol()
    {
        return $this->tiporol;
    }

    public function setTiporol($tiporol)
    {
        $this->tiporol = $tiporol;
    }

    public function getLinkacceso()
    {
        return $this->linkacceso;
    }

    public function setLinkacceso($linkacceso)
    {
        $this->linkacceso = $linkacceso;
    }
}