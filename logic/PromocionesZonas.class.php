<?php

require_once '../data/Conexion.class.php';

class PromocionZona extends Conexion
{

    private $codpromocion;
    private $coddepartamento;
    private $codprovincia;
    private $coddistrito;


    /**
     * Get the value of codpromocion
     */
    public function getCodpromocion()
    {
        return $this->codpromocion;
    }

    /**
     * Set the value of codpromocion
     *
     * @return  self
     */
    public function setCodpromocion($codpromocion)
    {
        $this->codpromocion = $codpromocion;

        return $this;
    }

    /**
     * Get the value of coddepartamento
     */
    public function getCoddepartamento()
    {
        return $this->coddepartamento;
    }

    /**
     * Set the value of coddepartamento
     *
     * @return  self
     */
    public function setCoddepartamento($coddepartamento)
    {
        $this->coddepartamento = $coddepartamento;

        return $this;
    }

    public function getCodprovincia()
    {
        return $this->codprovincia;
    }

    public function setCodprovincia($codprovincia)
    {
        $this->codprovincia = $codprovincia;
    }

    public function getCoddistrito()
    {
        return $this->coddistrito;
    }

    public function setCoddistrito($coddistrito)
    {
        $this->coddistrito = $coddistrito;
    }
    public function listarZona()
    {
        try {
            $sql = "
            select p.coddepartamento,
            IFNULL(u.departamento, IFNULL(f.departamento,'Todos los departamentos')) as departamento,
            p.codprovincia,
            IFNULL(u.provincia, IFNULL(g.provincia, 'Todas las provincias')) as provincia,
            p.coddistrito,
            IFNULL(u.distrito, 'Todos los distritos') as distrito
                    from
                        promociones_objetivo p
                        left join
                        ubigeo u on p.coddepartamento = u.coddepartamento and p.codprovincia = u.codprovincia and p.coddistrito = u.coddistrito
                    left join 
                        (select coddepartamento, departamento from ubigeo group by coddepartamento, departamento ) f on p.coddepartamento = f.coddepartamento
                    left join 
                        (select coddepartamento, codprovincia, provincia from ubigeo group by coddepartamento, codprovincia, provincia ) g on p.codprovincia = g.codprovincia and p.coddepartamento = g.coddepartamento
                    where
                        cod_promocion = :p_codpromocion
                    order by
                        p.coddepartamento, p.codprovincia, p.coddistrito;
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

            $sql = "select fn_registrarPromocionObjetivo(
                                    :p_codpromocion,
                                    :p_coddepartamento, 
                                    :p_codprovincia,
                                    :p_coddistrito
                                 );";
            $sentencia = $this->dblink->prepare($sql);
            // $sentencia->bindParam(":p_codigoCandidato", $this->getCodigoCandidato());
            $sentencia->bindParam(":p_codpromocion", $this->getCodpromocion());
            $sentencia->bindParam(":p_coddepartamento", $this->getCoddepartamento());
            $sentencia->bindParam(":p_codprovincia", $this->getCodprovincia());
            $sentencia->bindParam(":p_coddistrito", $this->getCoddistrito());
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

            $sql = "select fn_eliminarPromocionObjetivo(
                                    :p_codpromocion,
                                    :p_coddepartamento, 
                                    :p_codprovincia,
                                    :p_coddistrito
                                 );";
            $sentencia = $this->dblink->prepare($sql);
            // $sentencia->bindParam(":p_codigoCandidato", $this->getCodigoCandidato());
            $sentencia->bindParam(":p_codpromocion", $this->getCodpromocion());
            $sentencia->bindParam(":p_coddepartamento", $this->getCoddepartamento());
            $sentencia->bindParam(":p_codprovincia", $this->getCodprovincia());
            $sentencia->bindParam(":p_coddistrito", $this->getCoddistrito());
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
