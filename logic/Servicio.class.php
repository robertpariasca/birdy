<?php

require_once '../data/Conexion.class.php';

class Servicio extends Conexion{

    private $cod_servicio;
    private $nom_servicio;
    private $tiempo_servicio;
    private $meses_servicio;
    private $costo_servicio;
    private $inicio_servicio;
    private $fin_servicio;
    private $pago_mensual;
    private $estado;



    public function getCod_servicio()
    {
        return $this->cod_servicio;
    }

    public function setCod_servicio($cod_servicio)
    {
        $this->cod_servicio = $cod_servicio;
    }

    public function getNom_servicio()
    {
        return $this->nom_servicio;
    }

    public function setNom_servicio($nom_servicio)
    {
        $this->nom_servicio = $nom_servicio;
    }

    public function getTiempo_servicio()
    {
        return $this->tiempo_servicio;
    }

    public function setTiempo_servicio($tiempo_servicio)
    {
        $this->tiempo_servicio = $tiempo_servicio;
    }

    public function getMeses_servicio()
    {
        return $this->meses_servicio;
    }

    public function setMeses_servicio($meses_servicio)
    {
        $this->meses_servicio = $meses_servicio;
    }

    public function getCosto_servicio()
    {
        return $this->costo_servicio;
    }

    public function setCosto_servicio($costo_servicio)
    {
        $this->costo_servicio = $costo_servicio;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function getInicio_servicio()
    {
        return $this->inicio_servicio;
    }

    public function setInicio_servicio($inicio_servicio)
    {
        $this->inicio_servicio = $inicio_servicio;
    }

    public function getFin_servicio()
    {
        return $this->fin_servicio;
    }

    public function setFin_servicio($fin_servicio)
    {
        $this->fin_servicio = $fin_servicio;
    }

    public function getPago_mensual()
    {
        return $this->pago_mensual;
    }

    public function setPago_mensual($pago_mensual)
    {
        $this->pago_mensual = $pago_mensual;
    }
    
}