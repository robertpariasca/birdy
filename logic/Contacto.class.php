<?php

require_once '../data/Conexion.class.php';

class Contacto extends Conexion
{

    private $codcliente;
    private $documento;
    private $nomcontacto;
    private $cargocontacto;
    private $direccion;
    private $celular;
    private $correo;
    private $coddepartamento;
    private $codprovincia;
    private $coddistrito;
    private $nropropuesta;
 
    public function getDocumento()
    {
        return $this->documento;
    }

    public function setDocumento($documento)
    {
        $this->documento = $documento;
    }

    public function getCodcliente()
    {
        return $this->codcliente;
    }

    public function getNomcontacto()
    {
        return $this->nomcontacto;
    }

    public function getCargocontacto()
    {
        return $this->cargocontacto;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function getCelular()
    {
        return $this->celular;
    }

    public function getCorreo()
    {
        return $this->correo;
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
 
    public function getNropropuesta()
    {
        return $this->nropropuesta;
    }

    public function setCoddistrito($coddistrito)
    {
        $this->coddistrito = $coddistrito;
    }

    public function setCodcliente($codcliente)
    {
        $this->codcliente = $codcliente;
    }

    public function setNomcontacto($nomcontacto)
    {
        $this->nomcontacto = $nomcontacto;
    }

    public function setCargocontacto($cargocontacto)
    {
        $this->cargocontacto = $cargocontacto;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function setCelular($celular)
    {
        $this->celular = $celular;
    }

    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }

    public function setNropropuesta($nropropuesta)
    {
        $this->nropropuesta = $nropropuesta;
    }

    public function agregar()
    {
        $this->dblink->beginTransaction();

        try {

                    $sql = "select fn_registrarContacto(              
                                    :p_codcliente,
                                    :p_documento,     
                                    :p_nomcontacto, 
                                    :p_cargocontacto,
                                    :p_direccion,
                                    :p_celular,
                                    :P_correo,
                                    :p_coddepartamento,
                                    :p_codprovincia,
                                    :p_coddistrito
                                 );";
                    $sentencia = $this->dblink->prepare($sql);
                    // $sentencia->bindParam(":p_codigoCandidato", $this->getCodigoCandidato());
                    $sentencia->bindParam(":p_codcliente", $this->getCodcliente());
                    $sentencia->bindParam(":p_documento", $this->getDocumento());
                    $sentencia->bindParam(":p_nomcontacto", $this->getNomcontacto());
                    $sentencia->bindParam(":p_cargocontacto", $this->getCargocontacto());
                    $sentencia->bindParam(":p_direccion", $this->getDireccion());
                    $sentencia->bindParam(":p_celular", $this->getCelular());
                    $sentencia->bindParam(":P_correo", $this->getCorreo());
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

    public function listarContacto()
    {
        try {
            $sql = "
                    select
                        c.nom_contacto,
                        c.cargo_contacto,
                        c.direccion,
                        c.celular,
                        c.correo,
                        u.doc_cliente,
                        u.nom_cliente
                    from
                        contacto c
                    right join
                        usuario u
                    on
                        c.cod_cliente = u.cod_cliente
                    where
                        c.cod_cliente=:p_codcliente;
                ";

            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_codcliente", $this->getCodcliente());
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

                    $sql = "select fn_eliminarContacto(                    
                                    :p_codcliente,
                                    :p_nomcontacto, 
                                    :p_cargocontacto,
                                    :p_direccion,
                                    :p_celular,
                                    :P_correo
                                 );";
                    $sentencia = $this->dblink->prepare($sql);
                    // $sentencia->bindParam(":p_codigoCandidato", $this->getCodigoCandidato());
                    $sentencia->bindParam(":p_codcliente", $this->getCodcliente());
                    $sentencia->bindParam(":p_nomcontacto", $this->getNomcontacto());
                    $sentencia->bindParam(":p_cargocontacto", $this->getCargocontacto());
                    $sentencia->bindParam(":p_direccion", $this->getDireccion());
                    $sentencia->bindParam(":p_celular", $this->getCelular());
                    $sentencia->bindParam(":P_correo", $this->getCorreo());

                    $sentencia->execute();

                    $this->dblink->commit();
                    return "EXITO";
  
            
        } catch (Exception $exc) {
            $this->dblink->rollBack();
            throw $exc;
        }

        return false;
    }

    public function listarContactoProveedores()
    {
        try {
            $sql = "
                    select
                        nom_contacto,
                        cargo_contacto,
                        direccion,
                        celular,
                        correo
                    from
                        contacto c
                    inner join
                        usuario u
                    on 
                        c.cod_cliente=u.cod_cliente
                    where
                        u.rol = '2'
                    ;
                ";

            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    public function listarContactoCliente()
    {
        try {
            $sql = "
                    select
                        nom_contacto,
                        cargo_contacto,
                        direccion,
                        celular,
                        correo
                    from
                        contacto c
                    inner join
                        usuario u
                    on 
                        c.cod_cliente=u.cod_cliente
                    inner join
                        propuesta_cabecera p
                    on
                        c.cod_cliente=p.cod_solicitante
                    where
                        p.nro_propuesta=:p_nropropuesta
                    ;
                ";

            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_nropropuesta", $this->getNropropuesta());
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $exc) {
            throw $exc;
        }
    }

}
