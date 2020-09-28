<?php

require_once '../data/Conexion.class.php';

class Conductor extends Conexion{

    private $idconductor;
    private $codproveedor;
    private $nrodoc;
    private $nombre;
    private $nrolicencia;
    private $numtelefono;
    private $imagen;

    public function getIdconductor()
    {
        return $this->idconductor;
    }

    public function setIdconductor($idconductor)
    {
        $this->idconductor = $idconductor;
    }

    public function getCodproveedor()
    {
        return $this->codproveedor;
    }

    public function setCodproveedor($codproveedor)
    {
        $this->codproveedor = $codproveedor;
    }

    public function getNrodoc()
    {
        return $this->nrodoc;
    }

    public function setNrodoc($nrodoc)
    {
        $this->nrodoc = $nrodoc;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getNrolicencia()
    {
        return $this->nrolicencia;
    }

    public function setNrolicencia($nrolicencia)
    {
        $this->nrolicencia = $nrolicencia;
    }

    public function getNumtelefono()
    {
        return $this->numtelefono;
    }

    public function setNumtelefono($numtelefono)
    {
        $this->numtelefono = $numtelefono;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }

    public function listarConductor()
    {
        try {
            $sql = "
                    select
                        id_conductor,
                        nro_doc,
                        nombre,
                        nro_licencia,
                        num_telefono,
                        foto
                    from
                        conductor
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

                    $sql = "select fn_registrarConductor(                    
                                    :p_codproveedor,
                                    :p_nrodoc, 
                                    :p_nombre,
                                    :p_nrolicencia,
                                    :p_numtelefono,
                                    :p_imagen
                                 );";
                    $sentencia = $this->dblink->prepare($sql);
                    // $sentencia->bindParam(":p_codigoCandidato", $this->getCodigoCandidato());
                    $sentencia->bindParam(":p_codproveedor", $this->getCodproveedor());
                    $sentencia->bindParam(":p_nrodoc", $this->getNrodoc());
                    $sentencia->bindParam(":p_nombre", $this->getNombre());
                    $sentencia->bindParam(":p_nrolicencia", $this->getNrolicencia());
                    $sentencia->bindParam(":p_numtelefono", $this->getNumtelefono());
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

                    $sql = "delete from conductor where id_conductor=:p_idconductor;";
                    $sentencia = $this->dblink->prepare($sql);
                    // $sentencia->bindParam(":p_codigoCandidato", $this->getCodigoCandidato());
                    $sentencia->bindParam(":p_idconductor", $this->getIdconductor());
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
