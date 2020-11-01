<?php

require_once '../data/Conexion.class.php';

class Propuesta extends Conexion
{

    private $nropropuesta;
    private $codsolicitante;
    private $tiposubasta;
    private $fechacreacion;
    private $fechacierre;
    private $observaciones;
    private $estado;

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

    public function getTiposubasta()
    {
        return $this->tiposubasta;
    }

    public function setTiposubasta($tiposubasta)
    {
        $this->tiposubasta = $tiposubasta;
    }

    public function getFechacreacion()
    {
        return $this->fechacreacion;
    }

    public function setFechacreacion($fechacreacion)
    {
        $this->fechacreacion = $fechacreacion;
    }

    public function getFechacierre()
    {
        return $this->fechacierre;
    }

    public function setFechacierre($fechacierre)
    {
        $this->fechacierre = $fechacierre;
    }

    public function getObservaciones()
    {
        return $this->observaciones;
    }

    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;
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
        try {

            $sql = "
                        select 
                            nro_propuesta,
                            cod_solicitante,
                            (
                                CASE 
                                    WHEN tipo_subasta = '1' THEN 'Carga'
                                    WHEN tipo_subasta = '2' THEN 'Producto'
                                    WHEN tipo_subasta = '3' THEN 'Servicio'
                                    ELSE 'No Asignado'
                                END) as tipo_subasta,
                            fecha_creacion,
                            fecha_cierre,
                            observaciones,
                            estado
                        from 
                            propuesta_cabecera
                        where
                            cod_solicitante = :p_codsolicitante;
                ";

            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_codsolicitante", $this->getCodsolicitante());
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $exc) {
            throw $exc;
        }
    }
}