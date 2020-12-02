<?php

require_once '../data/Conexion.class.php';

class ContratoCoordenadas extends Conexion
{

    private $idcontrato;
    private $latitude;
    private $longitude;

    public function getIdcontrato()
    {
        return $this->idcontrato;
    }

    public function setIdcontrato($idcontrato)
    {
        $this->idcontrato = $idcontrato;
    }

    public function getLatitude()
    {
        return $this->latitude;
    }

    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    public function getLongitude()
    {
        return $this->longitude;
    }

    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    public function listar()
    {
        $this->dblink->beginTransaction();
        try {
            $sql = "select 
            id_contrato,
            latitude,
            longitude
        from 
            contrato_coordenadas
        where
            id_contrato=:p_idcontrato    
            ;";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_idcontrato", $this->getIdcontrato());
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