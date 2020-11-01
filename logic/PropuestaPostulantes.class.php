<?php

require_once '../data/Conexion.class.php';

class PropuestaPostulantes extends Conexion
{

    private $propuestapostulantes;
    private $nropropuesta;
    private $codpostulante;
    private $costocobrado;
    private $detallespropuesta;

    public function getPropuestapostulantes()
    {
        return $this->propuestapostulantes;
    }

    public function setPropuestapostulantes($propuestapostulantes)
    {
        $this->propuestapostulantes = $propuestapostulantes;
    }

    public function getNropropuesta()
    {
        return $this->nropropuesta;
    }

    public function setNropropuesta($nropropuesta)
    {
        $this->nropropuesta = $nropropuesta;
    }

    public function getCodpostulante()
    {
        return $this->codpostulante;
    }

    public function setCodpostulante($codpostulante)
    {
        $this->codpostulante = $codpostulante;
    }

    public function getCostocobrado()
    {
        return $this->costocobrado;
    }

    public function setCostocobrado($costocobrado)
    {
        $this->costocobrado = $costocobrado;
    }

    public function getDetallespropuesta()
    {
        return $this->detallespropuesta;
    }

    public function setDetallespropuesta($detallespropuesta)
    {
        $this->detallespropuesta = $detallespropuesta;
    }
}
