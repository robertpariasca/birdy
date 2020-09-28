<?php

require_once '../data/Conexion.class.php';
session_name("Birdy");
session_start();

class Cita extends Conexion {

    private $Tratamiento_id;
    private $Historial_tratamiento_id;
    private $Cod_paciente_Historial_tratamiento_id;
    private $Fecha_historial_tratamiento;
    private $Hora_historial_tratamiento;
    private $Descripcion_historial_tratamiento;

    private $CodHorario;
    private $Cita_id;
    private $Fecha;
    private $Hora;
    private $Horario;
    private $Consultorio;
    private $Descripcion;
    private $Doc_id;
    private $NombreDoctor;
    private $Estado;
    private $Doc_id_paciente;
    private $Ciudad_paciente;
    private $EstadoCivil_paciente;
    private $Edad_paciente;
    private $Nombre_paciente;
    private $Apellidos_paciente;
    private $Sexo_paciente;
    private $Ocupacion_paciente;
    private $Religion_paciente;
    private $Domicilio_paciente;
    private $Telefono_paciente;
    private $PersonaResponsable_paciente;
    private $TelefonoResponsable_paciente;

    public function getCodHorario() {
        return $this->CodHorario;
    }

    public function getTratamiento_id() {
        return $this->Tratamiento_id;
    }

    public function getHistorial_tratamiento_id() {
        return $this->Historial_tratamiento_id;
    }

    public function getCod_paciente_Historial_tratamiento_id() {
        return $this->Cod_paciente_Historial_tratamiento_id;
    }
    public function getFecha_historial_tratamiento() {
        return $this->Fecha_historial_tratamiento;
    }
    public function getHora_historial_tratamiento() {
        return $this->Hora_historial_tratamiento;
    }
    public function getDescripcion_historial_tratamiento() {
        return $this->Descripcion_historial_tratamiento;
    }

    public function setTratamiento_id($Tratamiento_id) {
        $this->Tratamiento_id = $Tratamiento_id;
    }
    public function setHistorial_tratamiento_id($Historial_tratamiento_id) {
        $this->Historial_tratamiento_id = $Historial_tratamiento_id;
    }
    public function setCod_paciente_Historial_tratamiento_id($Cod_paciente_Historial_tratamiento_id) {
        $this->Cod_paciente_Historial_tratamiento_id = $Cod_paciente_Historial_tratamiento_id;
    }
    public function setFecha_historial_tratamiento($Fecha_historial_tratamiento) {
        $this->Fecha_historial_tratamiento = $Fecha_historial_tratamiento;
    }
    public function setHora_historial_tratamiento($Hora_historial_tratamiento) {
        $this->Hora_historial_tratamiento = $Hora_historial_tratamiento;
    }
    public function setDescripcion_historial_tratamiento($Descripcion_historial_tratamiento) {
        $this->Descripcion_historial_tratamiento = $Descripcion_historial_tratamiento;
    }

    public function getCita_id() {
        return $this->Cita_id;
    }

    public function getFecha() {
        return $this->Fecha;
    }

    public function getHora() {
        return $this->Hora;
    }

    public function getHorario() {
        return $this->Horario;
    }

    public function getConsultorio() {
        return $this->Consultorio;
    }

    public function getDescripcion() {
        return $this->Descripcion;
    }

    public function getDoc_id() {
        return $this->Doc_id;
    }

    public function getNombreDoctor() {
        return $this->NombreDoctor;
    }

    public function getEstado() {
        return $this->Estado;
    }

    public function getDoc_id_paciente() {
        return $this->Doc_id_paciente;
    }

    public function getCiudad_paciente() {
        return $this->Ciudad_paciente;
    }

    public function getEstadoCivil_paciente() {
        return $this->EstadoCivil_paciente;
    }

    public function getEdad_paciente() {
        return $this->Edad_paciente;
    }

    public function getNombre_paciente() {
        return $this->Nombre_paciente;
    }

    public function getApellidos_paciente() {
        return $this->Apellidos_paciente;
    }

    public function getSexo_paciente() {
        return $this->Sexo_paciente;
    }

    public function getOcupacion_paciente() {
        return $this->Ocupacion_paciente;
    }

    public function getReligion_paciente() {
        return $this->Religion_paciente;
    }

    public function getDomicilio_paciente() {
        return $this->Domicilio_paciente;
    }

    public function getTelefono_paciente() {
        return $this->Telefono_paciente;
    }

    public function getPersonaResponsable_paciente() {
        return $this->PersonaResponsable_paciente;
    }

    public function getTelefonoResponsable_paciente() {
        return $this->TelefonoResponsable_paciente;
    }

    public function setCodHorario($CodHorario) {
        $this->CodHorario = $CodHorario;
    }

    public function setCita_id($Cita_id) {
        $this->Cita_id = $Cita_id;
    }

    public function setFecha($Fecha) {
        $this->Fecha = $Fecha;
    }

     public function setHora($Hora) {
        $this->Hora = $Hora;
    }

     public function setHorario($Horario) {
        $this->Horario = $Horario;
    }

    public function setConsultorio($Consultorio) {
        $this->Consultorio = $Consultorio;
    }

    public function setDescripcion($Descripcion) {
        $this->Descripcion = $Descripcion;
    }

    public function setDoc_id($Doc_id) {
        $this->Doc_id = $Doc_id;
    }

    public function setNombreDoctor($NombreDoctor) {
        $this->NombreDoctor = $NombreDoctor;
    }

    public function setEstado($Estado) {
        $this->Estado = $Estado;
    }

    public function setDoc_id_paciente($Doc_id_paciente) {
        $this->Doc_id_paciente = $Doc_id_paciente;
    }

    public function setCiudad_paciente($Ciudad_paciente) {
        $this->Ciudad_paciente = $Ciudad_paciente;
    }

    public function setEstadoCivil_paciente($EstadoCivil_paciente) {
        $this->EstadoCivil_paciente = $EstadoCivil_paciente;
    }

    public function setEdad_paciente($Edad_paciente) {
        $this->Edad_paciente = $Edad_paciente;
    }

    public function setNombre_paciente($Nombre_paciente) {
        $this->Nombre_paciente = $Nombre_paciente;
    }

    public function setApellidos_paciente($Apellidos_paciente) {
        $this->Apellidos_paciente = $Apellidos_paciente;
    }

    public function setSexo_paciente($Sexo_paciente) {
        $this->Sexo_paciente = $Sexo_paciente;
    }

    public function setOcupacion_paciente($Ocupacion_paciente) {
        $this->Ocupacion_paciente = $Ocupacion_paciente;
    }

    public function setReligion_paciente($Religion_paciente) {
        $this->Religion_paciente = $Religion_paciente;
    }

    public function setDomicilio_paciente($Domicilio_paciente) {
        $this->Domicilio_paciente = $Domicilio_paciente;
    }

    public function setTelefono_paciente($Telefono_paciente) {
        $this->Telefono_paciente = $Telefono_paciente;
    }

    public function setPersonaResponsable_paciente($PersonaResponsable_paciente) {
        $this->PersonaResponsable_paciente = $PersonaResponsable_paciente;
    }

    public function setTelefonoResponsable_paciente($TelefonoResponsable_paciente) {
        $this->TelefonoResponsable_paciente = $TelefonoResponsable_paciente;
    }

    public function listar() {
        try {

            switch ($_SESSION["tipo"]) {
                case 'A':
                            $sql = "
                                select 
                                    c.cita_id,
                                    c.fecha,
                                    c.hora as horacita,
                                    c.horario,
                                    c.descripcion,
                                    u.nombrecompleto,
                                    c.nombre_doctor,
                                    c.estado,
                                    c.paciente_id,
                                    o.nombre_consultorio
                                from 
                                    cita c inner join usuario u
                                on
                                    c.doc_id = u.doc_id inner join consultorio o
                                on
                                    c.consultorio_id = o.consultorio_id
                            ";
                    break;

                case 'D': // si el email es not null, entonces es un doctor
                            $sql = "
                                select 
                                    c.cita_id,
                                    c.fecha,
                                    c.hora as horacita,
                                    c.horario,
                                    c.descripcion,
                                    u.nombrecompleto,
                                    c.nombre_doctor,
                                    c.estado,
                                    c.paciente_id,
                                    o.nombre_consultorio,
                                    'D' as doctor_id
                                from 
                                    cita c inner join usuario u
                                on
                                    c.doc_id = u.doc_id inner join consultorio o
                                on
                                    c.consultorio_id = o.consultorio_id
                                where
                                    c.nombre_doctor = '$_SESSION[s_usuario]';
                            ";
                    break;

                case 'C':
                            $sql = "
                                select 
                                    c.cita_id,
                                    c.fecha,
                                    c.hora as horacita,
                                    c.horario,
                                    c.descripcion,
                                    u.nombrecompleto,
                                    c.nombre_doctor,
                                    c.estado,
                                    c.paciente_id,
                                    'C' as cliente_id,
                                    o.nombre_consultorio
                                from 
                                    cita c inner join usuario u
                                on
                                    c.doc_id = u.doc_id inner join credenciales_acceso a
                                on
                                    c.doc_id = a.doc_id inner join consultorio o
                                on
                                    c.consultorio_id = o.consultorio_id
                                where
                                    c.doc_id = '$_SESSION[s_doc_id]';
                            ";
                    break;
                 default: 
                          $sql = "
                                select 
                                    c.cita_id,
                                    c.fecha,
                                    c.hora as horacita,
                                    c.horario,
                                    c.descripcion,
                                    u.nombrecompleto,
                                    c.nombre_doctor,
                                    c.estado,
                                    c.paciente_id,
                                    o.nombre_consultorio,
                                    h.tratamiento_id,
                                    h.fecha as fechahistratamiento,
                                    h.hora
                                from 
                                    cita c inner join usuario u
                                on
                                    c.doc_id = u.doc_id inner join consultorio o
                                on
                                    c.consultorio_id = o.consultorio_id inner join paciente p
                                on
                                    c.paciente_id = p.paciente_id left join historial_tratamiento h
                                on
                                    p.paciente_id = h.paciente_id
                            ";      
                    break;
            }
            
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    public function agregar() {
        $this->dblink->beginTransaction();

        try {
            $sql = "select * from f_generar_correlativo('cita') as nc";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute();

            if ($sentencia->rowCount()) {
                $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
                $nuevoCodigo = $resultado["nc"];
                $this->setCita_id($nuevoCodigo);

                $sql = "

                    select * from fn_registrarCita_paciente(
                                                :p_codHorario,
                                                :p_cita_id,
                                                :p_fecha,
                                                :p_hora,
                                                :p_horario,
                                                :p_consultorio,
                                                :p_descripcion,
                                                :p_doc_id_usuario,
                                                :p_nombreDoctor,
                                                :p_doc_id_paciente,
                                                :p_nombre_paciente,
                                                :p_apellidos_paciente,
                                                :p_edad_paciente,
                                                :p_sexo_paciente,
                                                :p_ciudad_paciente,
                                                :p_estadoCivil_paciente,
                                                :p_ocupacion_paciente,
                                                :p_religion_paciente,
                                                :p_domicilio_paciente,
                                                :p_telefono_paciente,
                                                :p_personaResponsable_paciente,
                                                :p_telefonoResponsable_paciente
                                             );
                    ";
                $sentencia = $this->dblink->prepare($sql);
    // Cita
                $sentencia->bindParam(":p_codHorario", $this->getCodHorario());
                $sentencia->bindParam(":p_cita_id", $this->getCita_id());
                $sentencia->bindParam(":p_fecha", $this->getFecha());
                $sentencia->bindParam(":p_hora", $this->getHora());
                $sentencia->bindParam(":p_horario", $this->getHorario());
                $sentencia->bindParam(":p_consultorio", $this->getConsultorio());
                $sentencia->bindParam(":p_descripcion", $this->getDescripcion());
                $sentencia->bindParam(":p_doc_id_usuario", $this->getDoc_id());
                $sentencia->bindParam(":p_nombreDoctor", $this->getNombreDoctor());
                
    // Paciente
                $sentencia->bindParam(":p_doc_id_paciente", $this->getDoc_id_paciente());
                $sentencia->bindParam(":p_ciudad_paciente", $this->getCiudad_paciente());
                $sentencia->bindParam(":p_estadoCivil_paciente", $this->getEstadoCivil_paciente());
                $sentencia->bindParam(":p_edad_paciente", $this->getEdad_paciente());
                $sentencia->bindParam(":p_nombre_paciente", $this->getNombre_paciente());
                $sentencia->bindParam(":p_apellidos_paciente", $this->getApellidos_paciente());
                $sentencia->bindParam(":p_sexo_paciente", $this->getSexo_paciente());
                $sentencia->bindParam(":p_ocupacion_paciente", $this->getOcupacion_paciente());
                $sentencia->bindParam(":p_religion_paciente", $this->getReligion_paciente());
                $sentencia->bindParam(":p_domicilio_paciente", $this->getDomicilio_paciente());
                $sentencia->bindParam(":p_telefono_paciente", $this->getTelefono_paciente());
                $sentencia->bindParam(":p_personaResponsable_paciente", $this->getPersonaResponsable_paciente());
                $sentencia->bindParam(":p_telefonoResponsable_paciente", $this->getTelefonoResponsable_paciente());
                $sentencia->execute();

                $sql = "

                                insert into log_cita
                                values(
                                        '$_SESSION[s_doc_id]',
                                        '$_SESSION[s_usuario]',
                                         $_SESSION[cargo_id],
                                        '$_SESSION[tipo]',
                                        (select current_date),
                                        (select current_time),
                                        'Insert',
                                        '$_SERVER[REMOTE_ADDR]',
                                        :p_cita_id
                                       );
                    ";
                $sentencia = $this->dblink->prepare($sql);
                $sentencia->bindParam(":p_cita_id", $this->getCita_id());
                $sentencia->execute();

                $sql = "

                                insert into log_paciente
                                values(
                                        '$_SESSION[s_doc_id]',
                                        '$_SESSION[s_usuario]',
                                         $_SESSION[cargo_id],
                                        '$_SESSION[tipo]',
                                        (select current_date),
                                        (select current_time),
                                        'Insert',
                                        '$_SERVER[REMOTE_ADDR]',
                                        :p_doc_id_paciente
                                       );
                    ";
                $sentencia = $this->dblink->prepare($sql);
                $sentencia->bindParam(":p_doc_id_paciente", $this->getDoc_id_paciente());
                $sentencia->execute();
                
                $this->dblink->commit();
                return true;
            } else {
                throw new Exception("No se ha configurado el correlativo para la tabla cita y paciente");
            }
        } catch (Exception $exc) {
            $this->dblink->rollBack();
            throw $exc;
        }
 
        return false;
    }

    public function agregarHistorialTratamiento(
                                                    $cod_tratamiento,
                                                    $cod_citaTratamiento,
                                                    $cod_paciente,
                                                    $fechaHistTratamiento,
                                                    $horaHistTratamiento,
                                                    $horarioHistTratamiento,
                                                    $descripcionHistTratamiento
                                                ) {
        $this->dblink->beginTransaction();

        try {
            
            
               // $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
                //$nuevoCodigo = $resultado["nc"];
               // $this->setHistorial_tratamiento_id($nuevoCodigo);

               
                $sql = "
                    select * from fn_registrarCita_historialTratamiento(
                                                $cod_tratamiento,
                                                $cod_citaTratamiento,
                                                $cod_paciente,
                                                '$fechaHistTratamiento',
                                                '$horaHistTratamiento',
                                                '$horarioHistTratamiento',
                                                '$descripcionHistTratamiento'
                                             );
                    ";
                $sentencia = $this->dblink->prepare($sql);
                //$sentencia->bindParam(":p_historial_tratamiento_id", $this->getHistorial_tratamiento_id());
                /*
                $sentencia->bindParam(":p_tratamiento_id", $this->getTratamiento_id());
                $sentencia->bindParam(":p_cita_id", $this->getCita_id());
                $sentencia->bindParam(":p_historial_tratamiento_id", $this->getHistorial_tratamiento_id());
                $sentencia->bindParam(":p_cod_pac", $this->getCod_paciente_Historial_tratamiento_id());
                $sentencia->bindParam(":p_fechaHisTra", $this->getFecha_historial_tratamiento());
                $sentencia->bindParam(":p_horaHisTra", $this->getHora_historial_tratamiento());
                $sentencia->bindParam(":p_descripcionHisTra", $this->getDescripcion_historial_tratamiento());
                */
                $sentencia->execute();
                
                $this->dblink->commit();
                return true;
            
        } catch (Exception $exc) {
            $this->dblink->rollBack();
            throw $exc;
        }
 
        return false;
    }

    public function leerDatos($p_codigoPaciente) {
        try {
            $sql = "
                    select 
                        p.paciente_id,
                        p.doc_id as doc_paciente,
                        c.doc_id as doc_usuario,
                        p.nombres,
                        p.apellidos,
                        p.edad,
                        p.sexo,
                        p.naturalde,
                        p.estado_civil,
                        p.ocupacion,
                        p.religion,
                        p.domicilio,
                        p.telefono,
                        p.personaresponsable,
                        p.personaresponsable_telefono,
                        c.estado,
                        c.cita_id,
                        c.fecha,
                        c.nombre_doctor,
                        c.descripcion
                    from 
                        cita c inner join paciente p
                    on
                        c.paciente_id = p.paciente_id
                    where
                        c.paciente_id = :p_codigo_paciente;
                ";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_codigo_paciente", $p_codigoPaciente);
            $sentencia->execute();
            $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    public function leerDatosHorario($p_codigoHorario_atencion) {
        try {
            $sql = "
                    select
                        distinct on(
                                        concat(h.dia_semana, ', ',h.numero,' de ',h.mes,' del ', h.ano), 
                                        concat(d.nombre, ', ',d.apellido)
                                    )

                        horario_atencion_id,
                        concat(d.nombre, ' ',d.apellido) as nombresDoctor,
                        c.nombre_consultorio,
                        concat(h.dia_semana, ', ',h.numero,' de ',h.mes,' del ', h.ano) as fecha,
                        h.hora,
                        h.horario,
                        d.doctor_id,
                        c.nombre_consultorio,
                        c.consultorio_id
                    from 
                        horario_atencion h inner join doctor d
                    on
                        h.doctor_id = d.doctor_id inner join consultorio c
                    on
                        h.consultorio_id = c.consultorio_id
                    where
                        h.horario_atencion_id = $p_codigoHorario_atencion;
                ";
            $sentencia = $this->dblink->prepare($sql);
            //$sentencia->bindParam(":p_codigo_paciente", $p_codigoPaciente);
            $sentencia->execute();
            $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    public function leerDatosHistorialTratamiento($p_codigocita, $p_codigopaciente, $p_fechahisttratamiento_cita, $p_hora_tratamiento) {
        try {
            $sql = "
                    select 
                        c.cita_id,
                        c.paciente_id,
                        t.fecha,
                        t.hora,
                        t.horario,
                        t.descripcion,
                        t.tratamiento_id
                    from 
                        cita c inner join paciente p
                    on
                        c.paciente_id = p.paciente_id left join  historial_tratamiento t
                    on
                        p.paciente_id = t.paciente_id
                    where
                        c.cita_id = $p_codigocita and c.paciente_id = $p_codigopaciente or (t.fecha = '$p_fechahisttratamiento_cita' and t.hora = '$p_hora_tratamiento');
                ";
            $sentencia = $this->dblink->prepare($sql);
            //$sentencia->bindParam(":p_codigo_paciente", $p_codigoPaciente);
            $sentencia->execute();
            $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    public function editar() {
        try {
            $sql = "
                        select * from fn_registrarCita_paciente(
                                                null,
                                                :p_cita_id,
                                                null,
                                                null,
                                                null,
                                                null,
                                                :p_descripcion,
                                                null,
                                                null,
                                                :p_doc_id_paciente,
                                                :p_nombre_paciente,
                                                :p_apellidos_paciente,
                                                :p_edad_paciente,
                                                :p_sexo_paciente,
                                                :p_ciudad_paciente,
                                                :p_estadoCivil_paciente,
                                                :p_ocupacion_paciente,
                                                :p_religion_paciente,
                                                :p_domicilio_paciente,
                                                :p_telefono_paciente,
                                                :p_personaResponsable_paciente,
                                                :p_telefonoResponsable_paciente
                                             );
                ";
            $sentencia = $this->dblink->prepare($sql);
            // Cita
               // $sentencia->bindParam(":p_codHorario", $this->getCodHorario());
                $sentencia->bindParam(":p_cita_id", $this->getCita_id());
                
    // Paciente
                $sentencia->bindParam(":p_doc_id_paciente", $this->getDoc_id_paciente());
                $sentencia->bindParam(":p_ciudad_paciente", $this->getCiudad_paciente());
                $sentencia->bindParam(":p_estadoCivil_paciente", $this->getEstadoCivil_paciente());
                $sentencia->bindParam(":p_edad_paciente", $this->getEdad_paciente());
                $sentencia->bindParam(":p_nombre_paciente", $this->getNombre_paciente());
                $sentencia->bindParam(":p_apellidos_paciente", $this->getApellidos_paciente());
                $sentencia->bindParam(":p_sexo_paciente", $this->getSexo_paciente());
                $sentencia->bindParam(":p_ocupacion_paciente", $this->getOcupacion_paciente());
                $sentencia->bindParam(":p_religion_paciente", $this->getReligion_paciente());
                $sentencia->bindParam(":p_domicilio_paciente", $this->getDomicilio_paciente());
                $sentencia->bindParam(":p_telefono_paciente", $this->getTelefono_paciente());
                $sentencia->bindParam(":p_personaResponsable_paciente", $this->getPersonaResponsable_paciente());
                $sentencia->bindParam(":p_telefonoResponsable_paciente", $this->getTelefonoResponsable_paciente());
                $sentencia->bindParam(":p_descripcion", $this->getDescripcion());
                $sentencia->execute();
                
                $sql = "

                                insert into log_cita
                                values(
                                        '$_SESSION[s_doc_id]',
                                        '$_SESSION[s_usuario]',
                                         $_SESSION[cargo_id],
                                        '$_SESSION[tipo]',
                                        (select current_date),
                                        (select current_time),
                                        'Update',
                                        '$_SERVER[REMOTE_ADDR]',
                                        :p_cita_id
                                       );
                    ";
                $sentencia = $this->dblink->prepare($sql);
                $sentencia->bindParam(":p_cita_id", $this->getCita_id());
                $sentencia->execute();
            return true;
        } catch (Exception $exc) {
            throw $exc;
        }
        return false;
    }

    public function eliminar() {
        try {
            $sql = "
                select * from fn_eliminarCursoPruebaPregunta(:p_curso_id);
                ";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_curso_id", $this->getCodigo_curso());
            $sentencia->execute();

            $sql = "

                                insert into log_cita
                                values(
                                        '$_SESSION[s_doc_id]',
                                        '$_SESSION[s_usuario]',
                                         $_SESSION[cargo_id],
                                        '$_SESSION[tipo]',
                                        (select current_date),
                                        (select current_time),
                                        'Delete',
                                        '$_SERVER[REMOTE_ADDR]',
                                        :p_cita_id
                                       );
                    ";
                $sentencia = $this->dblink->prepare($sql);
                $sentencia->bindParam(":p_cita_id", $this->getCita_id());
                $sentencia->execute();
                $sentencia->execute();
            return true;
        } catch (Exception $exc) {
            throw $exc;
        }
        return false;
    }

    public function editarEstardo($cod_citaEstado, $estado_cita) {
        try {
            $sql = "
                update 
                    cita 
                set  
                    estado = '$estado_cita'
                where
                    cita_id = $cod_citaEstado
                ";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute();
            return true;
        } catch (Exception $exc) {
            throw $exc;
        }
        return false;
    }

    public function listarCitaIndex($cod_doctor) { // lista para que se muestre en la página index.php
        try {

            $sql1 = "select
                        count(*) as estado
                    from
                        cita
                    where
                        doctor_id = $cod_doctor";
            $sentencia = $this->dblink->prepare($sql1);
            $sentencia->execute();
            $sentencia->rowCount();
            $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
            $nuevoCodigo = $resultado["estado"];
            $this->setDoctor_id($nuevoCodigo);
            if( $this->getDoctor_id() > 0)
            {
                $sql2 = "
                    select 
                            distinct on(f.fecha_id) 
                            f.fecha_id,
                            concat(f.dia_semana, ' ',f.numero, ' de ',f.mes) as fecha,
                            f.hora
                        from 
                            fecha f 
                    
                        where
                            concat(f.dia_semana, ' ',f.numero, ' de ',f.mes) in (select 
                                                                                    fecha
                                                                                 from 
                                                                                    cita
                                                                                  where
                                                                                    doctor_id = $cod_doctor
                                                                                        )
                            and f.hora not in (select 
                                                    hora
                                                from 
                                                    cita
                                               where
                                                    doctor_id = $cod_doctor
                                                );
                        ";
                $sentencia = $this->dblink->prepare($sql2);
            }else
            {
                $sql3 = "
                        select 
                            distinct on(f.fecha_id) 
                            f.fecha_id,
                            concat(f.dia_semana, ' ',f.numero, ' de ',f.mes) as fecha,
                            f.hora
                        from 
                            fecha f 
                        ";
                $sentencia = $this->dblink->prepare($sql3);
            }
            
            
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $exc) {
            throw $exc;
        }
    }

}
