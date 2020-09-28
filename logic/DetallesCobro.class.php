<?php

require_once '../data/Conexion.class.php';

class DetallesCobros extends Conexion{

    private $codcobro;
    private $coddetalle;
    private $tiempodetalle;
    private $costodetalle;

    public function getCodcobro()
    {
        return $this->codcobro;
    }

    public function setCodcobro($codcobro)
    {
        $this->codcobro = $codcobro;
    }

    public function getCoddetalle()
    {
        return $this->coddetalle;
    }

    public function setCoddetalle($coddetalle)
    {
        $this->coddetalle = $coddetalle;
    }

    public function getTiempodetalle()
    {
        return $this->tiempodetalle;
    }

    public function setTiempodetalle($tiempodetalle)
    {
        $this->tiempodetalle = $tiempodetalle;
    }

    public function getCostodetalle()
    {
        return $this->costodetalle;
    }

    public function setCostodetalle($costodetalle)
    {
        $this->costodetalle = $costodetalle;
    }

    
    public function listar()
    {
        try {
            $sql = "
                    select
                        cod_detalle,
                        nom_detalle,
                        tiempo_detalle,
                        costo_detalle
                    from
                        cobros_detalle
                    where
                        cod_cobro=:p_codcobro;
                ";

            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_codcobro", $this->getCodcobro());
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $exc) {
            throw $exc;
        }
    }

}