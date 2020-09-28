<?php

require_once '../data/Conexion.class.php';

class Proveedor extends Conexion{

    private $codproveedor; 
    private $tipodocproveedor;
    private $docproveedor;
    private $nomproveedor;
    private $dirproveedor;
    private $correo;
    private $nrocontacto;
    private $nomcontacto;
    private $fechainscripcion;
    private $rol;
    private $estado;

    private $alias;
    private $clave;

    public function getCodproveedor() {
        return $this->codproveedor;
    }

    public function getTipodocproveedor(){
        return $this->tipodocproveedor;
    }

    public function getDocproveedor(){
        return $this->docproveedor;
    }
    
    public function getNomproveedor()
    {
        return $this->nomproveedor;
    }

    public function getDirproveedor()
    {
        return $this->dirproveedor;
    }

    public function getCorreo()
    {
        return $this->correo;
    }

    public function getNrocontacto()
    {
        return $this->nrocontacto;
    }
    
    public function getNomcontacto()
    {
        return $this->nomcontacto;
    }
    
    public function getFechainscripcion()
    {
        return $this->fechainscripcion;
    }

    public function getRol()
    {
        return $this->rol;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function getAlias()
    {
        return $this->alias;
    }

    public function getClave()
    {
        return $this->clave;
    }


    public function setCodproveedor($codproveedor) 
    {
        $this->codproveedor = $codproveedor;
    }

    public function setTipodocproveedor($tipodocproveedor)
    {
        $this->tipodocproveedor = $tipodocproveedor;
    }

    public function setDocproveedor($docproveedor)
    {
        $this->docproveedor = $docproveedor;
    }
    
    public function setNomproveedor($nomproveedor)
    {
        $this->nomproveedor = $nomproveedor;
    }
    
    public function setDirproveedor($dirproveedor)
    {
        $this->dirproveedor = $dirproveedor;
    }

    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }

    public function setNrocontacto($nrocontacto)
    {
        $this->nrocontacto = $nrocontacto;
    }

    public function setNomcontacto($nomcontacto)
    {
        $this->nomcontacto = $nomcontacto;
    }

    public function setFechainscripcion($fechainscripcion)
    {
        $this->fechainscripcion = $fechainscripcion;
    }
    
    public function setRol($rol)
    {
        $this->rol = $rol;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function setAlias($alias)
    {
        $this->alias = $alias;
    }

    public function setClave($clave)
    {
        $this->clave = $clave;
    }

    public function agregar() {
        $this->dblink->beginTransaction();
        
        try {

        $sqlcon = "
        select 
                cod_proveedor
        from
                proveedor p
        inner join
                acceso a
        on
                p.cod_proveedor=a.cod_acceso
        where
                doc_proveedor=:p_docproveedor            
    ";
//fin dondiciones
$sentenciacon = $this->dblink->prepare($sqlcon);
$sentenciacon->bindParam(":p_docproveedor ", $this->getDocproveedor());
//            $sentencia->bindParam(":p_tipo", $this->getTipo());
$sentenciacon->execute();


$sqlcon2 = "
select 
cod_proveedor
from
        proveedor p
inner join
        acceso a
on
        p.cod_proveedor=a.cod_acceso
where
        alias=:p_alias;

";
//fin dondiciones
$sentenciacon2 = $this->dblink->prepare($sqlcon2);
$sentenciacon2->bindParam(":p_alias", $this->getAlias());
//            $sentencia->bindParam(":p_tipo", $this->getTipo());
$sentenciacon2->execute();        

if ($sentenciacon->rowCount()) {

  $this->dblink->commit();
        return "DUDoc";

}else if($sentenciacon2->rowCount()){
        return "DUAli";
}else {
    

    $sql = "select f_generar_correlativo('proveedor') as nc";
    $sentencia = $this->dblink->prepare($sql);
    $sentencia->execute();
    
    if ($sentencia->rowCount()){
        $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
        $nuevoCodigo = $resultado["nc"];
        $this->setCodproveedor($nuevoCodigo);

        $sql = "select fn_registrarProveedor(                    
                                :p_codproveedor,
                                :p_tipodoc,
                                :p_dni, 
                                :p_nombreCompleto,
                                :p_rol,
                                :p_usuario,
                                :p_password
                             );";
        $sentencia = $this->dblink->prepare($sql);
        // $sentencia->bindParam(":p_codigoCandidato", $this->getCodigoCandidato());
        $sentencia->bindParam(":p_codproveedor", $this->getCodproveedor());
        $sentencia->bindParam(":p_tipodoc", $this->getTipodocproveedor());
        $sentencia->bindParam(":p_dni", $this->getDocproveedor());
        $sentencia->bindParam(":p_nombreCompleto", $this->getNomproveedor());
        $sentencia->bindParam(":p_rol", $this->getRol());
        $sentencia->bindParam(":p_usuario", $this->getAlias());
        $sentencia->bindParam(":p_password", $this->getClave());
        //$sentencia->bindParam(":p_tipo", $this->getTipo());
        //$sentencia->bindParam(":p_estado", $this->getEstado());

        $sentencia->execute();
        $sql = "update correlativo set numero = numero + 1 
                where tabla='proveedor'";
        $sentencia = $this->dblink->prepare($sql);
        $sentencia->execute();
        $this->dblink->commit();

        return true;

    }else{
        throw new Exception("No se ha configurado el correlativo para la tabla Proveedor");
    }
}

            
        } catch (Exception $exc) {
            $this->dblink->rollBack();
            throw $exc;
        }
        
        return false;
    }

}