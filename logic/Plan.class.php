<?php

require_once '../data/Conexion.class.php';

class Plan extends Conexion{

    private $codsuscripcion;
    private $codcliente;
    private $fechainicio;
    private $fechafin;
    private $tipopago;
    private $fechapago;
    private $costo;
    private $codservicio;

    public function getCodsuscripcion()
    {
        return $this->codsuscripcion;
    }

    public function setCodsuscripcion($codsuscripcion)
    {
        $this->codsuscripcion = $codsuscripcion;
    }

    public function getCodcliente()
    {
        return $this->codcliente;
    }

    public function setCodcliente($codcliente)
    {
        $this->codcliente = $codcliente;
    }

    public function getFechainicio()
    {
        return $this->fechainicio;
    }

    public function setFechainicio($fechainicio)
    {
        $this->fechainicio = $fechainicio;
    }

    public function getFechafin()
    {
        return $this->fechafin;
    }

    public function setFechafin($fechafin)
    {
        $this->fechafin = $fechafin;
    }

    public function getTipopago()
    {
        return $this->tipopago;
    }

    public function setTipopago($tipopago)
    {
        $this->tipopago = $tipopago;
    }

    public function getFechapago()
    {
        return $this->fechapago;
    }

    public function setFechapago($fechapago)
    {
        $this->fechapago = $fechapago;
    }

    public function getCosto()
    {
        return $this->costo;
    }

    public function setCosto($costo)
    {
        $this->costo = $costo;
    }

    public function getCodservicio()
    {
        return $this->codservicio;
    }

    public function setCodservicio($codservicio)
    {
        $this->codservicio = $codservicio;
    }

    public function listar()
    {
        try {
            $sql = "
                    select
                        p.cod_suscripcion,
                        nom_detalle,
                        fecha_inicio,
                        fecha_fin
                    from
                        plan_cliente p
                    inner join
                        cobros_detalle d
                    on 
                        p.cod_servicio=d.cod_detalle
                    where
                        cod_cliente=:p_codcliente;
                ";

            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_codcliente", $this->getCodcliente());
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $exc) {
            throw $exc;
        }
    }

}