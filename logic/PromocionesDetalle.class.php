<?php

require_once '../data/Conexion.class.php';

class PromocionDetalle extends Conexion{

    private $codpromocion;
    private $codproducto;
    private $nomproducto;
    private $cantidadproducto;

    public function getCodpromocion()
    {
        return $this->codpromocion;
    }

    public function setCodpromocion($codpromocion)
    {
        $this->codpromocion = $codpromocion;
    }

    public function getCodproducto()
    {
        return $this->codproducto;
    }

    public function setCodproducto($codproducto)
    {
        $this->codproducto = $codproducto;
    }

    public function getNomproducto()
    {
        return $this->nomproducto;
    }

    public function setNomproducto($nomproducto)
    {
        $this->nomproducto = $nomproducto;
    }

    public function getCantidadproducto()
    {
        return $this->cantidadproducto;
    }

    public function setCantidadproducto($cantidadproducto)
    {
        $this->cantidadproducto = $cantidadproducto;
    }
    public function listarEdicion()
    {
        try {
            $sql = "
                    select
                        cod_producto,
                        nom_producto,
                        cantidad_producto
                    from
                        promociones_detalle 
                    where
                        cod_promocion = :p_codpromocion
                    order by
                        cod_promocion
                   ;
                ";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_codpromocion", $this->getCodpromocion());
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

                    $sql = "select fn_registrarPromocionDetalles(                    
                                    :p_codpromocion,
                                    :p_codproducto, 
                                    :p_nomproducto,
                                    :p_cantidad_producto
                                 );";
                    $sentencia = $this->dblink->prepare($sql);
                    // $sentencia->bindParam(":p_codigoCandidato", $this->getCodigoCandidato());
                    $sentencia->bindParam(":p_codpromocion", $this->getCodpromocion());
                    $sentencia->bindParam(":p_codproducto", $this->getCodproducto());
                    $sentencia->bindParam(":p_nomproducto", $this->getNomproducto());
                    $sentencia->bindParam(":p_cantidad_producto", $this->getCantidadproducto());
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
    public function eliminar()
    {
        $this->dblink->beginTransaction();

        try {

                    $sql = "select fn_eliminarPromocionDetalle(
                                    :p_codpromocion,
                                    :p_codproducto
                                 );";
                    $sentencia = $this->dblink->prepare($sql);
                    // $sentencia->bindParam(":p_codigoCandidato", $this->getCodigoCandidato());
                    $sentencia->bindParam(":p_codpromocion", $this->getCodpromocion());
                    $sentencia->bindParam(":p_codproducto", $this->getCodproducto());
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