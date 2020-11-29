<?php

require_once '../data/Conexion.class.php';

class ContratoCabecera extends Conexion
{

    private $idcontrato;
    private $idpropuesta;
    private $codsolicitante;
    private $codproveedor;
    private $fechacontrato;
    private $costo;
    private $comision;
    private $estado;

    public function getIdcontrato()
    {
        return $this->idcontrato;
    }

    public function setIdcontrato($idcontrato)
    {
        $this->idcontrato = $idcontrato;
    }

    public function getIdpropuesta()
    {
        return $this->idpropuesta;
    }

    public function setIdpropuesta($idpropuesta)
    {
        $this->idpropuesta = $idpropuesta;
    }

    public function getCodsolicitante()
    {
        return $this->codsolicitante;
    }

    public function setCodsolicitante($codsolicitante)
    {
        $this->codsolicitante = $codsolicitante;
    }

    public function getCodproveedor()
    {
        return $this->codproveedor;
    }

    public function setCodproveedor($codproveedor)
    {
        $this->codproveedor = $codproveedor;
    }

    public function getFechacontrato()
    {
        return $this->fechacontrato;
    }

    public function setFechacontrato($fechacontrato)
    {
        $this->fechacontrato = $fechacontrato;
    }

    public function getCosto()
    {
        return $this->costo;
    }

    public function setCosto($costo)
    {
        $this->costo = $costo;
    }

    public function getComision()
    {
        return $this->comision;
    }

    public function setComision($comision)
    {
        $this->comision = $comision;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function listar()
    {
        $this->dblink->beginTransaction();
        try {
            $sql = "select 
            id_contrato,
            id_propuesta,
            cod_solicitante,
            cod_proveedor,
            Fecha_contrato,
            Costo,
            Comision,
            Estado
        from 
            contrato_cabecera;";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            $this->dblink->commit();
            return $resultado;
        } catch (Exception $exc) {
            $this->dblink->rollBack();
            throw $exc;
        }
        return false;
    }
}
