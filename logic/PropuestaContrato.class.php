<?php

require_once '../data/Conexion.class.php';

class PropuestaContrato extends Conexion
{
    private $idpostulantepropuesta;
    private $idcontrato;
    private $idpropuesta;
    private $codsolicitante;
    private $codproveedor;
    private $fechacontrato;
    private $costo;
    private $comision;
    private $estado;

    public function getIdpostulantepropuesta()
    {
        return $this->idpostulantepropuesta;
    }

    public function setIdpostulantepropuesta($idpostulantepropuesta)
    {
        $this->idpostulantepropuesta = $idpostulantepropuesta;
    }

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

    public function listar(){
        $this->dblink->beginTransaction();
        try{
            $sql = "select 
                        p.nro_propuesta,
                        c.cod_solicitante, 
                        p.cod_postulante, 
                        NOW() as fecha_contrato, 
                        p.costo_cobrado 
                    from 
                        propuesta_postulantes p 
                    inner join 
                        propuesta_cabecera c 
                    on 
                        p.nro_propuesta=c.nro_propuesta
                    where
                        id_postulante_propuesta=:p_idpostulantepropuesta
                    ;";
                    $sentencia = $this->dblink->prepare($sql);
                    $sentencia->bindParam(":p_idpostulantepropuesta", $this->getIdpostulantepropuesta());
                    $sentencia->execute();
                    $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                    $this->dblink->commit();
                    return $resultado;
        }catch(Exception $exc){
            $this->dblink->rollBack();
            throw $exc;
        }
        return false;
    }

    public function agregar()
    {
        $this->dblink->beginTransaction();

        try {

                    $sql = "select fn_registrarContrato(                    
                                    :p_idpropuesta,
                                    :p_codsolicitante, 
                                    :p_codproveedor,
                                    :p_fechacontrato,
                                    :p_costo,
                                    :p_comision
                                );";
                    $sentencia = $this->dblink->prepare($sql);
                    // $sentencia->bindParam(":p_codigoCandidato", $this->getCodigoCandidato());
                    $sentencia->bindParam(":p_idpropuesta", $this->getIdpropuesta());
                    $sentencia->bindParam(":p_codsolicitante", $this->getCodsolicitante());
                    $sentencia->bindParam(":p_codproveedor", $this->getCodproveedor());
                    $sentencia->bindParam(":p_fechacontrato", $this->getFechacontrato());
                    $sentencia->bindParam(":p_costo", $this->getCosto());
                    $sentencia->bindParam(":p_comision", $this->getComision());
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