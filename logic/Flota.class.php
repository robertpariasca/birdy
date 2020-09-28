<?php

require_once '../data/Conexion.class.php';

class Flota extends Conexion{

    private $idflota;
    private $codproveedor;
    private $tipovehiculo;
    private $capacidadkg;
    private $placa;
    private $gps;
    private $imagen;

    public function getIdflota()
    {
        return $this->idflota;
    }

    public function setIdflota($idflota)
    {
        $this->idflota = $idflota;
    }

    public function getCodproveedor()
    {
        return $this->codproveedor;
    }

    public function setCodproveedor($codproveedor)
    {
        $this->codproveedor = $codproveedor;
    }

    public function getTipovehiculo()
    {
        return $this->tipovehiculo;
    }

    public function setTipovehiculo($tipovehiculo)
    {
        $this->tipovehiculo = $tipovehiculo;
    }

    public function getCapacidadkg()
    {
        return $this->capacidadkg;
    }

    public function setCapacidadkg($capacidadkg)
    {
        $this->capacidadkg = $capacidadkg;
    }

    public function getPlaca()
    {
        return $this->placa;
    }

    public function setPlaca($placa)
    {
        $this->placa = $placa;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }

    public function getGps()
    {
        return $this->gps;
    }

    public function setGps($gps)
    {
        $this->gps = $gps;
    }



    public function listarFlota()
    {
        try {
            $sql = "
                    select
                        id_flota,
                        tipo_vehiculo,
                        capacidadkg,
                        placa,
                        gps,
                        imagen
                    from
                        flota
                    where
                        cod_proveedor=:p_codproveedor;
                ";

            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_codproveedor", $this->getCodproveedor());
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    public function agregar()
    {
        $this->dblink->beginTransaction();

        try {

                    $sql = "select fn_registrarFlota(                    
                                    :p_codproveedor,
                                    :p_tipovehiculo, 
                                    :p_capacidad,
                                    :p_placa,
                                    :p_gps,
                                    :p_imagen
                                 );";
                    $sentencia = $this->dblink->prepare($sql);
                    // $sentencia->bindParam(":p_codigoCandidato", $this->getCodigoCandidato());
                    $sentencia->bindParam(":p_codproveedor", $this->getCodproveedor());
                    $sentencia->bindParam(":p_tipovehiculo", $this->getTipovehiculo());
                    $sentencia->bindParam(":p_capacidad", $this->getCapacidadkg());
                    $sentencia->bindParam(":p_placa", $this->getPlaca());
                    $sentencia->bindParam(":p_gps", $this->getGps());
                    $sentencia->bindParam(":p_imagen", $this->getImagen());
                    $sentencia->execute();

                    $this->dblink->commit();
                    return "EXITO";
  
            
        } catch (Exception $exc) {
            $this->dblink->rollBack();
            throw $exc;
        }

        return false;
    }
    public function eliminar()
    {
        $this->dblink->beginTransaction();

        try {

                    $sql = "delete from flota where id_flota=:p_idflota;";
                    $sentencia = $this->dblink->prepare($sql);
                    // $sentencia->bindParam(":p_codigoCandidato", $this->getCodigoCandidato());
                    $sentencia->bindParam(":p_idflota", $this->getIdflota());
                    $sentencia->execute();

                    $this->dblink->commit();
                    return "EXITO";
  
            
        } catch (Exception $exc) {
            $this->dblink->rollBack();
            throw $exc;
        }

        return false;
    }

}
