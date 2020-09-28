<?php

require_once '../data/Conexion.class.php';

class Acceso extends Conexion
{

    private $idacceso;
    private $codacceso;
    private $alias;
    private $clave;
    private $id_rol;


    public function getIdacceso()
    {
        return $this->idacceso;
    }

    public function setIdacceso($idacceso)
    {
        $this->idacceso = $idacceso;
    }

    public function getCodacceso()
    {
        return $this->codacceso;
    }

    public function setCodacceso($codacceso)
    {
        $this->codacceso = $codacceso;
    }

    public function getAlias()
    {
        return $this->alias;
    }

    public function setAlias($alias)
    {
        $this->alias = $alias;
    }

    public function getClave()
    {
        return $this->clave;
    }

    public function setClave($clave)
    {
        $this->clave = $clave;
    }

    public function getId_rol()
    {
        return $this->id_rol;
    }

    public function setId_rol($id_rol)
    {
        $this->id_rol = $id_rol;
    }

    public function iniciarSesion()
    {
        try {
            $sql = "
                    select 
                            id_acceso,
                            cod_acceso,
                            alias,
                            clave,
                            a.id_rol,                            
                            nom_rol,
                            tipo_rol,
                            link_acceso
                    from
                            acceso a inner join rol r
                    on 
                            (a.id_rol = r.id_rol)
                    where
                            alias = :p_alias;
                ";


            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_alias", $this->getAlias());
            //            $sentencia->bindParam(":p_tipo", $this->getTipo());
            $sentencia->execute();

            if ($sentencia->rowCount()) { //Le pregunto si ha devuelto registros
                //El usuario si existe
                $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
                if ($resultado["clave"] === md5($this->getClave())) {
                    //return $resultado["id_rol"];


                        $sqlDatos = "
                        select
                            cod_cliente,
                            nom_cliente,
                            estado
                        from
                            usuario
                        where
                            cod_cliente= :p_codacceso;
                            ";
                        $sentenciaDatos = $this->dblink->prepare($sqlDatos);
                        $sentenciaDatos->bindParam(":p_codacceso", $resultado["cod_acceso"]);
                        //            $sentencia->bindParam(":p_tipo", $this->getTipo());
                        $sentenciaDatos->execute();
                        $resultadoDatos = $sentenciaDatos->fetch(PDO::FETCH_ASSOC);

                        if ($resultadoDatos["estado"] === "0") {
                            return "IN"; //Usuario Inactivo
                        } else {
                            session_name("Birdy");
                            session_start();

                            $_SESSION["cod_acceso"] = $resultado["cod_acceso"];
                            $_SESSION["alias"] = $this->getAlias();
                            $_SESSION["id_rol"] = $resultado["id_rol"];
                            $_SESSION["nom_rol"] = $resultado["nom_rol"];
                            $_SESSION["nom_ingreso"] = $resultadoDatos["nom_cliente"];
                            $_SESSION["link_acceso"] = $resultado["link_acceso"];


                            $sql2 = "insert into log_inicio_sesion values(
                                                                            null,
                                                                            :p_codcli, 
                                                                            :p_nombre,
                                                                            :p_rol, 
                                                                            :p_fecha,
                                                                            :p_hora,
                                                                            :p_ip
                                                                        );";
                            $sentencia2 = $this->dblink->prepare($sql2);
                            $sentencia2->bindParam(":p_codcli", $_SESSION["cod_acceso"]);
                            $sentencia2->bindParam(":p_nombre", $_SESSION["nom_ingreso"]);
                            $sentencia2->bindParam(":p_rol", $_SESSION["id_rol"]);
                            $sentencia2->bindParam(":p_fecha", date("d/m/Y"));
                            $sentencia2->bindParam(":p_hora", date("h:i:sa"));
                            $sentencia2->bindParam(":p_ip", $_SERVER["REMOTE_ADDR"]);
                            $sentencia2->execute();
                            return $_SESSION["cod_acceso"]; //Si ingresa
                        }
                    
                } else { //la contraseña no es igual
                    return "CI"; //Contraseña incorrecta
                }
            } else { //No se encontró registros (El usuario no existe)
                return "NE"; //No Existe
            }
        } catch (Exception $exc) {
            throw $exc;
        }
    }
}
