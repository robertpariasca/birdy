<?php

require_once '../data/Conexion.class.php';

class PropuestaDetalle extends Conexion{

    private $nropropuestaproductos;
    private $nropropuesta;
    private $codsolicitante;
    private $nomproducto;
    private $cantidadproducto;

    public function getNropropuestaproductos()
    {
        return $this->nropropuestaproductos;
    }

    public function setNropropuestaproductos($nropropuestaproductos)
    {
        $this->nropropuestaproductos = $nropropuestaproductos;
    }

    public function getNropropuesta()
    {
        return $this->nropropuesta;
    }

    public function setNropropuesta($nropropuesta)
    {
        $this->nropropuesta = $nropropuesta;
    }

    public function getCodsolicitante()
    {
        return $this->codsolicitante;
    }

    public function setCodsolicitante($codsolicitante)
    {
        $this->codsolicitante = $codsolicitante;
    }

    public function getNomproducto()
    {
        return $this->nomproducto;
    }

    public function setNomproducto($nomproducto)
    {
        $this->nomproducto = $nomproducto;
    }

    public function getCantidadproducto()
    {
        return $this->cantidadproducto;
    }

    public function setCantidadproducto($cantidadproducto)
    {
        $this->cantidadproducto = $cantidadproducto;
    }
}