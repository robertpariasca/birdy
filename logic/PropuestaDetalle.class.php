<?php

require_once '../data/Conexion.class.php';

class PropuestaDetalle extends Conexion{

    private $nrodetallepropuesta;
    private $nropropuesta;
    private $volumen;
    private $dimensiones;
    private $peso;
    private $caracteristicas;
    private $departamentosalida;
    private $provinciasalida;
    private $distritosalida;
    private $direccionsalida;
    private $fechasalida;
    private $horasalida;
    private $departamentollegada;
    private $provinciallegada;
    private $distritollegada;
    private $direccionllegada;
    private $fechallegada;
    private $horallegada;
    private $detalles;

    public function getNrodetallepropuesta()
    {
        return $this->nrodetallepropuesta;
    }

    public function setNrodetallepropuesta($nrodetallepropuesta)
    {
        $this->nrodetallepropuesta = $nrodetallepropuesta;
    }

    public function getNropropuesta()
    {
        return $this->nropropuesta;
    }

    public function setNropropuesta($nropropuesta)
    {
        $this->nropropuesta = $nropropuesta;
    }

    public function getVolumen()
    {
        return $this->volumen;
    }

    public function setVolumen($volumen)
    {
        $this->volumen = $volumen;
    }

    public function getDimensiones()
    {
        return $this->dimensiones;
    }

    public function setDimensiones($dimensiones)
    {
        $this->dimensiones = $dimensiones;
    }

    public function getPeso()
    {
        return $this->peso;
    }

    public function setPeso($peso)
    {
        $this->peso = $peso;
    }

    public function getCaracteristicas()
    {
        return $this->caracteristicas;
    }

    public function setCaracteristicas($caracteristicas)
    {
        $this->caracteristicas = $caracteristicas;
    }

    public function getDepartamentosalida()
    {
        return $this->departamentosalida;
    }

    public function setDepartamentosalida($departamentosalida)
    {
        $this->departamentosalida = $departamentosalida;
    }

    public function getProvinciasalida()
    {
        return $this->provinciasalida;
    }

    public function setProvinciasalida($provinciasalida)
    {
        $this->provinciasalida = $provinciasalida;
    }

    public function getDistritosalida()
    {
        return $this->distritosalida;
    }

    public function setDistritosalida($distritosalida)
    {
        $this->distritosalida = $distritosalida;
    }

    public function getDireccionsalida()
    {
        return $this->direccionsalida;
    }

    public function setDireccionsalida($direccionsalida)
    {
        $this->direccionsalida = $direccionsalida;
    }

    public function getFechasalida()
    {
        return $this->fechasalida;
    }

    public function setFechasalida($fechasalida)
    {
        $this->fechasalida = $fechasalida;
    }

    public function getHorasalida()
    {
        return $this->horasalida;
    }

    public function setHorasalida($horasalida)
    {
        $this->horasalida = $horasalida;
    }

    public function getDepartamentollegada()
    {
        return $this->departamentollegada;
    }

    public function setDepartamentollegada($departamentollegada)
    {
        $this->departamentollegada = $departamentollegada;
    }

    public function getProvinciallegada()
    {
        return $this->provinciallegada;
    }

    public function setProvinciallegada($provinciallegada)
    {
        $this->provinciallegada = $provinciallegada;
    }

    public function getDistritollegada()
    {
        return $this->distritollegada;
    }

    public function setDistritollegada($distritollegada)
    {
        $this->distritollegada = $distritollegada;
    }

    public function getDireccionllegada()
    {
        return $this->direccionllegada;
    }

    public function setDireccionllegada($direccionllegada)
    {
        $this->direccionllegada = $direccionllegada;
    }

    public function getFechallegada()
    {
        return $this->fechallegada;
    }

    public function setFechallegada($fechallegada)
    {
        $this->fechallegada = $fechallegada;
    }

    public function getHorallegada()
    {
        return $this->horallegada;
    }

    public function setHorallegada($horallegada)
    {
        $this->horallegada = $horallegada;
    }

    public function getDetalles()
    {
        return $this->detalles;
    }

    public function setDetalles($detalles)
    {
        $this->detalles = $detalles;
    }
}