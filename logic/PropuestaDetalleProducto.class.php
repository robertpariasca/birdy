<?php

require_once '../data/Conexion.class.php';

class PropuestaDetalleProducto extends Conexion{

    private $nropropuestaproductos;
    private $nropropuesta;
    private $codproducto;
    private $nomproducto;
    private $cantidadproducto;

    public function getNropropuestaproductos()
    {
        return $this->nropropuestaproductos;
    }

    public function setNropropuestaproductos($nropropuestaproductos)
    {
        $this->nropropuestaproductos = $nropropuestaproductos;
    }

    public function getNropropuesta()
    {
        return $this->nropropuesta;
    }

    public function setNropropuesta($nropropuesta)
    {
        $this->nropropuesta = $nropropuesta;
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

    public function getCodproducto()
    {
        return $this->codproducto;
    }

    public function setCodproducto($codproducto)
    {
        $this->codproducto = $codproducto;
    }

    public function agregar()
    {
        $this->dblink->beginTransaction();

        try {

                    $sql = "select fn_registrarPropuestaProductos(                    
                                    :p_nropropuesta,
                                    :p_codproducto,
                                    :p_nomproducto,
                                    :p_canproducto
                                 );";
                    $sentencia = $this->dblink->prepare($sql);
                    $sentencia->bindParam(":p_nropropuesta", $this->getNropropuesta());
                    $sentencia->bindParam(":p_codproducto", $this->getCodproducto());
                    $sentencia->bindParam(":p_nomproducto", $this->getNomproducto());
                    $sentencia->bindParam(":p_canproducto", $this->getCantidadproducto());
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