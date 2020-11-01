<?php

require_once '../data/Conexion.class.php';

class PropuestaPostulantesDetalle extends Conexion
{

    private $idpropuestapostulantesdetalle;
    private $idpostulantepropuesta;
    private $nomchofer;
    private $dnichofer;
    private $placaauto;
    private $tipoauto;

    public function getIdpropuestapostulantesdetalle()
    {
        return $this->idpropuestapostulantesdetalle;
    }

    public function setIdpropuestapostulantesdetalle($idpropuestapostulantesdetalle)
    {
        $this->idpropuestapostulantesdetalle = $idpropuestapostulantesdetalle;
    }

    public function getIdpostulantepropuesta()
    {
        return $this->idpostulantepropuesta;
    }

    public function setIdpostulantepropuesta($idpostulantepropuesta)
    {
        $this->idpostulantepropuesta = $idpostulantepropuesta;
    }

    public function getNomchofer()
    {
        return $this->nomchofer;
    }

    public function setNomchofer($nomchofer)
    {
        $this->nomchofer = $nomchofer;
    }

    public function getDnichofer()
    {
        return $this->dnichofer;
    }

    public function setDnichofer($dnichofer)
    {
        $this->dnichofer = $dnichofer;
    }

    public function getPlacaauto()
    {
        return $this->placaauto;
    }

    public function setPlacaauto($placaauto)
    {
        $this->placaauto = $placaauto;
    }

    public function getTipoauto()
    {
        return $this->tipoauto;
    }

    public function setTipoauto($tipoauto)
    {
        $this->tipoauto = $tipoauto;
    }
}