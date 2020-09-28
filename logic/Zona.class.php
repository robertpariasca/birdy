<?php

require_once '../data/Conexion.class.php';

class Zona extends Conexion
{

    private $codproveedor;
    private $coddepartamento;
    private $codprovincia;
    private $coddistrito;

    public function getCodproveedor()
    {
        return $this->codproveedor;
    }

    public function setCodproveedor($codproveedor)
    {
        $this->codproveedor = $codproveedor;
    }

    public function getCoddepartamento()
    {
        return $this->coddepartamento;
    }

    public function setCoddepartamento($coddepartamento)
    {
        $this->coddepartamento = $coddepartamento;
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
             proveedor_atencion p
             left join
             ubigeo u on p.coddepartamento = u.coddepartamento and p.codprovincia = u.codprovincia and p.coddistrito = u.coddistrito
         left join 
             (select coddepartamento, departamento from ubigeo group by coddepartamento, departamento ) f on p.coddepartamento = f.coddepartamento
         left join 
             (select coddepartamento, codprovincia, provincia from ubigeo group by coddepartamento, codprovincia, provincia ) g on p.codprovincia = g.codprovincia and p.coddepartamento = g.coddepartamento
         where
             cod_proveedor = :p_codproveedor
         order by
             p.coddepartamento, p.codprovincia, p.coddistrito
                   ;
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


            $sqlcon = "
            select 
                    *
            from
                    proveedor_atencion
            where
                    cod_proveedor=:p_codproveedor
            and
                    coddepartamento=:p_coddepartamento
            and
                    codprovincia=:p_codprovincia
            and
                    coddistrito=:p_coddistrito;                  
        ";
            //fin dondiciones
            $sentenciacon = $this->dblink->prepare($sqlcon);
            $sentenciacon->bindParam(":p_codproveedor", $this->getCodproveedor());
            $sentenciacon->bindParam(":p_coddepartamento", $this->getCoddepartamento());
            $sentenciacon->bindParam(":p_codprovincia", $this->getCodprovincia());
            $sentenciacon->bindParam(":p_coddistrito", $this->getCoddistrito());
            $sentenciacon->execute();

            if ($sentenciacon->rowCount()) {

                $this->dblink->commit();
                return "DUDoc";
            } else {
                $sql = "select fn_registrarZona(                    
                                    :p_codproveedor,
                                    :p_coddepartamento, 
                                    :p_codprovincia,
                                    :p_coddistrito
                                 );";
                $sentencia = $this->dblink->prepare($sql);
                // $sentencia->bindParam(":p_codigoCandidato", $this->getCodigoCandidato());
                $sentencia->bindParam(":p_codproveedor", $this->getCodproveedor());
                $sentencia->bindParam(":p_coddepartamento", $this->getCoddepartamento());
                $sentencia->bindParam(":p_codprovincia", $this->getCodprovincia());
                $sentencia->bindParam(":p_coddistrito", $this->getCoddistrito());
                $sentencia->execute();

                $this->dblink->commit();
                return "EXITO";
            }
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

                $sql = "select fn_eliminarZona(                    
                                    :p_codproveedor,
                                    :p_coddepartamento,
                                    :p_codprovincia,
                                    :p_coddistrito
                                );";
                    $sentencia = $this->dblink->prepare($sql);
                    // $sentencia->bindParam(":p_codigoCandidato", $this->getCodigoCandidato());
                    $sentencia->bindParam(":p_codproveedor", $this->getCodproveedor());
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
