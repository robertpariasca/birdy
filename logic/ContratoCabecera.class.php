<?php

require_once '../data/Conexion.class.php';

class ContratoCabecera extends Conexion
{

    private $idcontrato;
    private $idpropuesta;
    private $codsolicitante;
    private $codproveedor;
    private $fechacontrato;
    private $costo;
    private $comision;
    private $calificacion;
    private $comentario;
    private $estado;

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

    public function getCalificacion()
    {
        return $this->calificacion;
    }

    public function setCalificacion($calificacion)
    {
        $this->calificacion = $calificacion;
    }

    public function getComentario()
    {
        return $this->comentario;
    }

    public function setComentario($comentario)
    {
        $this->comentario = $comentario;
    }

    public function listar()
    {
        $this->dblink->beginTransaction();
        try {
            $sql = "select 
            id_contrato,
            id_propuesta,
            cod_solicitante,
            cod_proveedor,
            Fecha_contrato,
            Costo,
            Comision,
            Estado
        from 
            contrato_cabecera
        where
            Estado = '1';";
            $sentencia = $this->dblink->prepare($sql);
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

    public function listarContrato()
    {
        $this->dblink->beginTransaction();
        try {
            $sql = "select 
            c.id_contrato,
            c.id_propuesta,
            c.cod_solicitante,
            c.cod_proveedor,
            c.Fecha_contrato,
            c.Costo,
            c.Comision,
            c.Estado,
            s.nombre_tipo
        from 
            contrato_cabecera c
        inner join
            propuesta_cabecera p
        on
            c.id_propuesta = p.nro_propuesta
        inner join
            tipo_servicio s
        on
            p.tipo_subasta = s.cod_tipo
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

    public function actualizar()
    {
        $this->dblink->beginTransaction();

        try {

                    $sql = "select fn_actualizarContrato(                    
                                    :p_calificacion,
                                    :p_comentario, 
                                    :p_idcontrato
                                 );";
                    $sentencia = $this->dblink->prepare($sql);
                    // $sentencia->bindParam(":p_codigoCandidato", $this->getCodigoCandidato());
                    $sentencia->bindParam(":p_calificacion", $this->getCalificacion());
                    $sentencia->bindParam(":p_comentario", $this->getComentario());
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
