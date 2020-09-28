<?php

require_once '../data/Conexion.class.php';

class Producto extends Conexion{

    private $codproveedor;
    private $codproducto;
    private $nomproducto;
    private $tipoproducto;

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

    public function getTipoproducto()
    {
        return $this->tipoproducto;
    }

    public function setTipoproducto($tipoproducto)
    {
        $this->tipoproducto = $tipoproducto;
    }

    public function getCodproveedor()
    {
        return $this->codproveedor;
    }

    public function setCodproveedor($codproveedor)
    {
        $this->codproveedor = $codproveedor;
    }

    public function listar()
    {
        try {
            $sql = "
                    select
                        p.cod_producto,
                        nom_producto,
                        nombre_tipo
                    from
                        producto p
                    inner join
                        tipo_producto t
                    on 
                        p.tipo_producto=t.cod_tipo
                    inner join
                        producto_proveedor r
                    on
                        p.cod_producto=r.cod_producto
                    where
                        cod_usuario=:p_codproveedor;
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

                    $sql = "select fn_registrarProducto(                    
                                    :p_codproveedor,
                                    :p_nomproducto, 
                                    :p_tipoproducto
                                 );";
                    $sentencia = $this->dblink->prepare($sql);
                    // $sentencia->bindParam(":p_codigoCandidato", $this->getCodigoCandidato());
                    $sentencia->bindParam(":p_codproveedor", $this->getCodproveedor());
                    $sentencia->bindParam(":p_nomproducto", $this->getNomproducto());
                    $sentencia->bindParam(":p_tipoproducto", $this->getTipoproducto());
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

                $sql = "select fn_eliminarProducto(                    
                                    :p_codproveedor,
                                    :p_codproducto
                                );";
                    $sentencia = $this->dblink->prepare($sql);
                    // $sentencia->bindParam(":p_codigoCandidato", $this->getCodigoCandidato());
                    $sentencia->bindParam(":p_codproveedor", $this->getCodproveedor());
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