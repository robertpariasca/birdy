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
    public function agregar()
    {
        $this->dblink->beginTransaction();

        try {

                    $sql = "select fn_registrarPropuestaPostulante(                    
                                    :p_nropropuesta,
                                    :p_codpostulante, 
                                    :p_costocobrado,
                                    :p_detallespropuesta
                                 )as nropropuesta;";
                    $sentencia = $this->dblink->prepare($sql);
                    $sentencia->bindParam(":p_nropropuesta", $this->getNropropuesta());
                    $sentencia->bindParam(":p_codpostulante", $this->getCodpostulante());
                    $sentencia->bindParam(":p_costocobrado", $this->getCostocobrado());
                    $sentencia->bindParam(":p_detallespropuesta", $this->getDetallespropuesta());
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
    public function listar()
    {
        try {

            $sql = "
                        select 
                            id_postulante_propuesta,
                            costo_cobrado,
                            detalles_propuesta,
                            tipo_subasta
                        from 
                            propuesta_postulantes p
                        inner join
                            propuesta_cabecera c
                        on 
                            p.nro_propuesta= c.nro_propuesta
                        where
                            p.nro_propuesta = :p_nropropuesta;
                ";

            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_nropropuesta", $this->getNropropuesta());
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $exc) {
            throw $exc;
        }
    }
}
