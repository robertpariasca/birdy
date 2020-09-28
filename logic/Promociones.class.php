<?php

require_once '../data/Conexion.class.php';

class Promocion extends Conexion{

    private $codpromocion;
    private $codproveedor;
    private $nompromocion;
    private $descripcionlarga;
    private $costoreal;
    private $descuento;
    private $costopromocion;
    private $fechacreacion;
    private $fechainiciovigencia;
    private $fechafinvigencia;
    private $tipopublicidad;
    private $stockpedido;
    private $imagen;
    private $estado;

    private $nombretipo;

    public function getCodpromocion()
    {
        return $this->codpromocion;
    }

    public function setCodpromocion($codpromocion)
    {
        $this->codpromocion = $codpromocion;
    }

    public function getNompromocion()
    {
        return $this->nompromocion;
    }

    public function setNompromocion($nompromocion)
    {
        $this->nompromocion = $nompromocion;
    }

    public function getDescripcionlarga()
    {
        return $this->descripcionlarga;
    }

    public function setDescripcionlarga($descripcionlarga)
    {
        $this->descripcionlarga = $descripcionlarga;
    }

    public function getCostoreal()
    {
        return $this->costoreal;
    }

    public function setCostoreal($costoreal)
    {
        $this->costoreal = $costoreal;
    }

    public function getDescuento()
    {
        return $this->descuento;
    }

    public function setDescuento($descuento)
    {
        $this->descuento = $descuento;
    }

    public function getCostopromocion()
    {
        return $this->costopromocion;
    }

    public function setCostopromocion($costopromocion)
    {
        $this->costopromocion = $costopromocion;
    }

    public function getFechacreacion()
    {
        return $this->fechacreacion;
    }

    public function setFechacreacion($fechacreacion)
    {
        $this->fechacreacion = $fechacreacion;
    }

    public function getFechainiciovigencia()
    {
        return $this->fechainiciovigencia;
    }

    public function setFechainiciovigencia($fechainiciovigencia)
    {
        $this->fechainiciovigencia = $fechainiciovigencia;
    }

    public function getFechafinvigencia()
    {
        return $this->fechafinvigencia;
    }

    public function setFechafinvigencia($fechafinvigencia)
    {
        $this->fechafinvigencia = $fechafinvigencia;
    }

    public function getTipopublicidad()
    {
        return $this->tipopublicidad;
    }

    public function setTipopublicidad($tipopublicidad)
    {
        $this->tipopublicidad = $tipopublicidad;
    }

    public function getStockpedido()
    {
        return $this->stockpedido;
    }

    public function setStockpedido($stockpedido)
    {
        $this->stockpedido = $stockpedido;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function getCodproveedor()
    {
        return $this->codproveedor;
    }

    public function setCodproveedor($codproveedor)
    {
        $this->codproveedor = $codproveedor;
    }

    public function getNombretipo()
    {
        return $this->nombretipo;
    }

    public function setNombretipo($nombretipo)
    {
        $this->nombretipo = $nombretipo;
    }
    public function listar()
    {
        try {
            $sql = "
                    select
                        cod_promocion,
                        nom_promocion,
                        costo_real,
                        costo_promocion,
                        fecha_creacion,
                        fecha_fin_vigencia,
                        stock_pedido
                    from
                        promociones
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
    public function listarEdicion()
    {
        try {
            $sql = "
                    select
                        cod_promocion,
                        nom_promocion,
                        descripcion_larga,
                        costo_real,
                        descuento,
                        costo_promocion,
                        fecha_inicio_vigencia,
                        fecha_fin_vigencia,
                        tipo_publicidad,
                        stock_pedido
                    from
                        promociones
                    where
                        cod_proveedor=:p_codproveedor
                    and
                        cod_promocion=:p_codpromocion;
                ";

            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_codproveedor", $this->getCodproveedor());
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

                    $sql = "select fn_registrarPromocion(                    
                                    :p_codproveedor,
                                    :p_nompromocion, 
                                    :p_descripcionlarga,
                                    :p_costoreal,
                                    :p_descuento,
                                    :p_costopromocion,
                                    :p_fechainiciovigencia,
                                    :p_fechafinvigencia,
                                    :p_tipopublicidad,
                                    :p_stockpedido
                                 ) as codpromocion;";
                    $sentencia = $this->dblink->prepare($sql);
                    // $sentencia->bindParam(":p_codigoCandidato", $this->getCodigoCandidato());
                    $sentencia->bindParam(":p_codproveedor", $this->getCodproveedor());
                    $sentencia->bindParam(":p_nompromocion", $this->getNompromocion());
                    $sentencia->bindParam(":p_descripcionlarga", $this->getDescripcionlarga());
                    $sentencia->bindParam(":p_costoreal", $this->getCostoreal());
                    $sentencia->bindParam(":p_descuento", $this->getDescuento());
                    $sentencia->bindParam(":p_costopromocion", $this->getCostopromocion());
                    $sentencia->bindParam(":p_fechainiciovigencia", $this->getFechainiciovigencia());
                    $sentencia->bindParam(":p_fechafinvigencia", $this->getFechafinvigencia());
                    $sentencia->bindParam(":p_tipopublicidad", $this->getTipopublicidad());
                    $sentencia->bindParam(":p_stockpedido", $this->getStockpedido());
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

                    $sql = "select fn_actualizarPromocion(                    
                                    :p_codproveedor,
                                    :p_nompromocion, 
                                    :p_descripcionlarga,
                                    :p_costoreal,
                                    :p_descuento,
                                    :p_costopromocion,
                                    :p_fechainiciovigencia,
                                    :p_fechafinvigencia,
                                    :p_tipopublicidad,
                                    :p_stockpedido,
                                    :p_codpromocion
                                 );";
                    $sentencia = $this->dblink->prepare($sql);
                    $sentencia->bindParam(":p_codpromocion", $this->getCodpromocion());
                    $sentencia->bindParam(":p_codproveedor", $this->getCodproveedor());
                    $sentencia->bindParam(":p_nompromocion", $this->getNompromocion());
                    $sentencia->bindParam(":p_descripcionlarga", $this->getDescripcionlarga());
                    $sentencia->bindParam(":p_costoreal", $this->getCostoreal());
                    $sentencia->bindParam(":p_descuento", $this->getDescuento());
                    $sentencia->bindParam(":p_costopromocion", $this->getCostopromocion());
                    $sentencia->bindParam(":p_fechainiciovigencia", $this->getFechainiciovigencia());
                    $sentencia->bindParam(":p_fechafinvigencia", $this->getFechafinvigencia());
                    $sentencia->bindParam(":p_tipopublicidad", $this->getTipopublicidad());
                    $sentencia->bindParam(":p_stockpedido", $this->getStockpedido());
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
    public function listarVista()
    {
        try {
            $sql = "
            SELECT  
                p.cod_promocion, p.nom_promocion, p.costo_real, p.costo_promocion, fecha_fin_vigencia, p.imagen, p.descripcion_larga, p.descuento, p.stock_pedido
            FROM 
                `promociones` p 
            inner join 
                promociones_detalle d 
            on 
                p.cod_promocion=d.cod_promocion
            inner join 
                producto r 
            on 
                d.cod_producto=r.cod_producto
            inner join
                tipo_producto t
            on
                r.tipo_producto= t.cod_tipo
            where
                p.cod_proveedor=:p_codproveedor
            and
                t.nombre_tipo=:p_nombretipo
            group by
                p.nom_promocion, p.costo_promocion, fecha_fin_vigencia, p.imagen
            ";

            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_codproveedor", $this->getCodproveedor());
            $sentencia->bindParam(":p_nombretipo", $this->getNombretipo());
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    public function eliminar()
    {
        $this->dblink->beginTransaction();

        try {

                    $sql = "select fn_eliminarPromocion(
                                    :p_codpromocion
                                 );";
                    $sentencia = $this->dblink->prepare($sql);
                    // $sentencia->bindParam(":p_codigoCandidato", $this->getCodigoCandidato());
                    $sentencia->bindParam(":p_codpromocion", $this->getCodpromocion());
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