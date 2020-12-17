<?php

require_once '../data/Conexion.class.php';

class PropuestaPostulantesDetalle extends Conexion
{

    private $idpropuestapostulantesdetalle;
    private $idpostulantepropuesta;
    private $idchofer;
    private $nomchofer;
    private $idauto;
    private $placaauto;

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

    public function getIdchofer()
    {
        return $this->idchofer;
    }

    public function setIdchofer($idchofer)
    {
        $this->idchofer = $idchofer;
    }

    public function getNomchofer()
    {
        return $this->nomchofer;
    }

    public function setNomchofer($nomchofer)
    {
        $this->nomchofer = $nomchofer;
    }

    public function getIdauto()
    {
        return $this->idauto;
    }

    public function setIdauto($idauto)
    {
        $this->idauto = $idauto;
    }
 
    public function getPlacaauto()
    {
        return $this->placaauto;
    }

    public function setPlacaauto($placaauto)
    {
        $this->placaauto = $placaauto;
    }
    public function agregar()
    {
        $this->dblink->beginTransaction();

        try {

                    $sql = "select fn_registrarPropuestaPostulanteChoferVehiculo(                    
                                    :p_idpostulantepropuesta,
                                    :p_idconductor, 
                                    :p_nomchofer,
                                    :p_idauto,
                                    :p_placaauto
                                 );";
                    $sentencia = $this->dblink->prepare($sql);
                    $sentencia->bindParam(":p_idpostulantepropuesta", $this->getIdpostulantepropuesta());
                    $sentencia->bindParam(":p_idconductor", $this->getIdchofer());
                    $sentencia->bindParam(":p_nomchofer", $this->getNomchofer());
                    $sentencia->bindParam(":p_idauto", $this->getIdauto());
                    $sentencia->bindParam(":p_placaauto", $this->getPlacaauto());
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
                            p.id_conductor,
                            p.nom_chofer,
                            p.id_auto,
                            p.placa_auto,
                            c.num_telefono
                        from 
                            propuesta_postulantes_detalles p
                        inner join
                            conductor c
                        on
                            p.id_conductor = c.id_conductor
                        where
                            p.id_postulante_propuesta = :p_idpostulantepropuesta;
                ";

            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_idpostulantepropuesta", $this->getIdpostulantepropuesta());
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $exc) {
            throw $exc;
        }
    }
}