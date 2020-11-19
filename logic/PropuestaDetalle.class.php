<?php

require_once '../data/Conexion.class.php';

class PropuestaDetalle extends Conexion{

    private $nrodetallepropuesta;
    private $nropropuesta;
    private $volumen;
    private $dimensiones;
    private $peso;
    private $caracteristicas;
    private $departamentosalida;
    private $provinciasalida;
    private $distritosalida;
    private $direccionsalida;
    private $fechasalida;
    private $horasalida;
    private $departamentollegada;
    private $provinciallegada;
    private $distritollegada;
    private $direccionllegada;
    private $fechallegada;
    private $horallegada;
    private $detalles;

    public function getNrodetallepropuesta()
    {
        return $this->nrodetallepropuesta;
    }

    public function setNrodetallepropuesta($nrodetallepropuesta)
    {
        $this->nrodetallepropuesta = $nrodetallepropuesta;
    }

    public function getNropropuesta()
    {
        return $this->nropropuesta;
    }

    public function setNropropuesta($nropropuesta)
    {
        $this->nropropuesta = $nropropuesta;
    }

    public function getVolumen()
    {
        return $this->volumen;
    }

    public function setVolumen($volumen)
    {
        $this->volumen = $volumen;
    }

    public function getDimensiones()
    {
        return $this->dimensiones;
    }

    public function setDimensiones($dimensiones)
    {
        $this->dimensiones = $dimensiones;
    }

    public function getPeso()
    {
        return $this->peso;
    }

    public function setPeso($peso)
    {
        $this->peso = $peso;
    }

    public function getCaracteristicas()
    {
        return $this->caracteristicas;
    }

    public function setCaracteristicas($caracteristicas)
    {
        $this->caracteristicas = $caracteristicas;
    }

    public function getDepartamentosalida()
    {
        return $this->departamentosalida;
    }

    public function setDepartamentosalida($departamentosalida)
    {
        $this->departamentosalida = $departamentosalida;
    }

    public function getProvinciasalida()
    {
        return $this->provinciasalida;
    }

    public function setProvinciasalida($provinciasalida)
    {
        $this->provinciasalida = $provinciasalida;
    }

    public function getDistritosalida()
    {
        return $this->distritosalida;
    }

    public function setDistritosalida($distritosalida)
    {
        $this->distritosalida = $distritosalida;
    }

    public function getDireccionsalida()
    {
        return $this->direccionsalida;
    }

    public function setDireccionsalida($direccionsalida)
    {
        $this->direccionsalida = $direccionsalida;
    }

    public function getFechasalida()
    {
        return $this->fechasalida;
    }

    public function setFechasalida($fechasalida)
    {
        $this->fechasalida = $fechasalida;
    }

    public function getHorasalida()
    {
        return $this->horasalida;
    }

    public function setHorasalida($horasalida)
    {
        $this->horasalida = $horasalida;
    }

    public function getDepartamentollegada()
    {
        return $this->departamentollegada;
    }

    public function setDepartamentollegada($departamentollegada)
    {
        $this->departamentollegada = $departamentollegada;
    }

    public function getProvinciallegada()
    {
        return $this->provinciallegada;
    }

    public function setProvinciallegada($provinciallegada)
    {
        $this->provinciallegada = $provinciallegada;
    }

    public function getDistritollegada()
    {
        return $this->distritollegada;
    }

    public function setDistritollegada($distritollegada)
    {
        $this->distritollegada = $distritollegada;
    }

    public function getDireccionllegada()
    {
        return $this->direccionllegada;
    }

    public function setDireccionllegada($direccionllegada)
    {
        $this->direccionllegada = $direccionllegada;
    }

    public function getFechallegada()
    {
        return $this->fechallegada;
    }

    public function setFechallegada($fechallegada)
    {
        $this->fechallegada = $fechallegada;
    }

    public function getHorallegada()
    {
        return $this->horallegada;
    }

    public function setHorallegada($horallegada)
    {
        $this->horallegada = $horallegada;
    }

    public function getDetalles()
    {
        return $this->detalles;
    }

    public function setDetalles($detalles)
    {
        $this->detalles = $detalles;
    }

    public function agregar()
    {
        $this->dblink->beginTransaction();

        try {

                    $sql = "select fn_registrarPropuestaDetalle(                    
                                    :p_nropropuesta,
                                    :p_volumen, 
                                    :p_dimensiones,
                                    :p_peso,
                                    :p_caracteristicas,
                                    :p_departamentosalida,
                                    :p_provinciasalida,
                                    :p_distritosalida,
                                    :p_direccionsalida,
                                    :p_fechasalida,
                                    :p_horasalida,
                                    :p_departamentollegada,
                                    :p_provinciallegada,
                                    :p_distritollegada,
                                    :p_direccionllegada,
                                    :p_fechallegada,
                                    :p_horallegada,
                                    :p_detalles
                                 );";
                    $sentencia = $this->dblink->prepare($sql);
                    $sentencia->bindParam(":p_nropropuesta", $this->getNropropuesta());
                    $sentencia->bindParam(":p_volumen", $this->getVolumen());
                    $sentencia->bindParam(":p_dimensiones", $this->getDimensiones());
                    $sentencia->bindParam(":p_peso", $this->getPeso());
                    $sentencia->bindParam(":p_caracteristicas", $this->getCaracteristicas());
                    $sentencia->bindParam(":p_departamentosalida", $this->getDepartamentosalida());
                    $sentencia->bindParam(":p_provinciasalida", $this->getProvinciasalida());
                    $sentencia->bindParam(":p_distritosalida", $this->getDistritosalida());
                    $sentencia->bindParam(":p_direccionsalida", $this->getDireccionsalida());
                    $sentencia->bindParam(":p_fechasalida", $this->getFechasalida());
                    $sentencia->bindParam(":p_horasalida", $this->getHorasalida());
                    $sentencia->bindParam(":p_departamentollegada", $this->getDepartamentollegada());
                    $sentencia->bindParam(":p_provinciallegada", $this->getProvinciallegada());
                    $sentencia->bindParam(":p_distritollegada", $this->getDistritollegada());
                    $sentencia->bindParam(":p_direccionllegada", $this->getDireccionllegada());
                    $sentencia->bindParam(":p_fechallegada", $this->getFechallegada());
                    $sentencia->bindParam(":p_horallegada", $this->getHorallegada());
                    $sentencia->bindParam(":p_detalles", $this->getDetalles()); 
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
    public function listarDetallado()
    {
        try {

            $sql = "
                        select 
                            nro_detalle_propuesta,
                            volumen,
                            dimensiones,
                            peso,
                            caracteristicas,
                            u.departamento as DepartamentoSalida ,
                            u.provincia as ProvinciaSalida,
                            u.distrito as DistritoSalida,
                            direccion_salida,
                            fecha_salida,
                            hora_salida,
                            b.departamento as DepartamentoLlegada,
                            b.provincia as ProvinciaLlegada,
                            b.distrito as DistritoLlegada,
                            direccion_llegada,
                            fecha_llegada,
                            hora_llegada,
                            detalles
                        from 
                            propuesta_detalles p
                            left join
                        ubigeo u on p.departamento_salida = u.coddepartamento and p.provincia_salida = u.codprovincia and p.distrito_salida = u.coddistrito
                    left join 
                    ubigeo b on p.departamento_llegada = b.coddepartamento and p.provincia_llegada = b.codprovincia and p.distrito_llegada = b.coddistrito
                        where
                            nro_propuesta=:p_nropropuesta
                        ;
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