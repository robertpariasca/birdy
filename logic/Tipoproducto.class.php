<?php

require_once '../data/Conexion.class.php';

class Tipoproducto extends Conexion{

    private $codtipo;
    private $nombretipo;
    private $estado;

    public function getCodtipo()
    {
        return $this->codtipo;
    }

    public function setCodtipo($codtipo)
    {
        $this->codtipo = $codtipo;
    }

    public function getNombretipo()
    {
        return $this->nombretipo;
    }

    public function setNombretipo($nombretipo)
    {
        $this->nombretipo = $nombretipo;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function listar()
    {
        try {
            $sql = "
                    select
                        cod_tipo,
                        nombre_tipo
                    from
                        tipo_producto
                    where
                        estado='1';
                ";

            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $exc) {
            throw $exc;
        }
    }

}