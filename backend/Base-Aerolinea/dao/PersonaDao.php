<?php

require_once("../../utlis/adodb5/adodb.inc.php");
require_once("../domain/Persona.php");

//this attribute enable to see the SQL's executed in the data base
//$this->labAdodb->debug=true;

class PersonaDao {

    private $labAdodb;
    
    public function __construct() {
        $driver = 'mysqli';
        $this->labAdodb = newAdoConnection($driver);
        $this->labAdodb->setCharset('utf8');
        $this->labAdodb->setConnectionParameter('CharacterSet', 'WE8ISO8859P15');
        $this->labAdodb->Connect("localhost", "root", "root", "progra3");
        
    }


    //agrega a la base de datos
    public function add(Persona $personas) {

        
        try {
            $sql = sprintf("insert into Persona (Usuario, Contrasena, Nombre, Apellido1, Apellido2, Correo, Fecha_Nacimiento, Direccion, Telefono1, Telefono2, Tipo_Usuario, Sexo) 
                                          values (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)",
                    $this->labAdodb->Param("Usuario"),
                    $this->labAdodb->Param("Contrasena"),
                    $this->labAdodb->Param("Nombre"),
                    $this->labAdodb->Param("Apellido1"),
                    $this->labAdodb->Param("Apellido2"),
                    $this->labAdodb->Param("Correo"),
                    $this->labAdodb->Param("Fecha_Nacimiento"),
                    $this->labAdodb->Param("Direccion"),
                    $this->labAdodb->Param("Telefono1"),
                    $this->labAdodb->Param("Telefono2"),
                    $this->labAdodb->Param("Tipo_Usuario"),
                    $this->labAdodb->Param("Sexo"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["Usuario"]             = $personas->getusuario();
            $valores["Contrasena"]          = $personas->getcontrasena();
            $valores["Nombre"]              = $personas->getnombre();
            $valores["Apellido1"]           = $personas->getapellido1();
            $valores["Apellido2"]           = $personas->getapellido2();
            $valores["Correo"]              = $personas->getcorreo();
            $valores["Fecha_Nacimiento"]    = $personas->getfecha_nacimiento();
            $valores["Direccion"]           = $personas->getdireccion();
            $valores["Telefono1"]           = $personas->gettelefono1();
            $valores["Telefono2"]           = $personas->gettelefono2();
            $valores["Tipo_Usuario"]        = $personas->gettipo_usuario();
            $valores["Sexo"]                = $personas->getSexo();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar el registro (Error generado en el metodo add de la clase PersonasDao), error:'.$e->getMessage());
        }
    }

    //verifica si existe en la base de datos por ID
    public function exist(Persona $personas) {

        
        $exist = false;
        try {
            $sql = sprintf("select * from Persona where  Usuario = %s ",
                            $this->labAdodb->Param("Usuario"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["Usuario"] = $personas->getusuario();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            if ($resultSql->RecordCount() > 0) {
                $exist = true;
            }
            return $exist;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener el registro (Error generado en el metodo exist de la clase PersonasDao), error:'.$e->getMessage());
        }
    }

    //modifica en la base de datos
    public function update(Persona $personas) {

        
        try {
            $sql = sprintf("update Persona set contrasena = %s, 
                                               nombre = %s, 
                                               apellido1 = %s,
                                               apellido2 = %s,
                                               correo = %s, 
                                               fecha_nacimiento = %s, 
                                               direccion = %s, 
                                               telefono1 = %s, 
                                               telefono2 = %s, 
                                               tipo_usuario = %s, 
                                               Sexo = %s 
                            where Usuario = %s",
                    $this->labAdodb->Param("Contrasena"),
                    $this->labAdodb->Param("Nombre"),
                    $this->labAdodb->Param("Apellido1"),
                    $this->labAdodb->Param("Apellido2"),
                    $this->labAdodb->Param("Correo"),
                    $this->labAdodb->Param("Fecha_Nacimiento"),
                    $this->labAdodb->Param("Direccion"),
                    $this->labAdodb->Param("Telefono1"),
                    $this->labAdodb->Param("Telefono2"),
                    $this->labAdodb->Param("Tipo_Usuario"),
                    $this->labAdodb->Param("Sexo"),
                    $this->labAdodb->Param("Usuario"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["Contrasena"]          = $personas->getcontrasena();
            $valores["Nombre"]              = $personas->getnombre();
            $valores["Apellido1"]           = $personas->getapellido1();
            $valores["Apellido2"]           = $personas->getapellido2();
            $valores["Correo"]              = $personas->getcorreo();
            $valores["Fecha_Nacimiento"]    = $personas->getfecha_Nacimiento();
            $valores["Direccion"]           = $personas->getdireccion();
            $valores["Telefono1"]           = $personas->gettelefono1();
            $valores["Telefono2"]           = $personas->gettelefono2();
            $valores["Tipo_Usuario"]        = $personas->gettipo_usuario();
            $valores["Sexo"]                = $personas->getsexo();
            $valores["Usuario"]             = $personas->getusuario();
            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase PersonasDao), error:'.$e->getMessage());
        }
    }

    //elimina en la base de datos
    public function delete(Persona $personas) {

        
        try {
            $sql = sprintf("delete from Persona where  Usuario = %s",
                            $this->labAdodb->Param("Usuario"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["Usuario"] = $personas->getusuario();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase PersonasDao), error:'.$e->getMessage());
        }
    }

    //busca en la base de datos
    public function searchById(Persona $personas) {

        
        $returnPersonas = null;
        try {
            $sql = sprintf("select * from Persona where Usuario = %s",
                            $this->labAdodb->Param("Usuario"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["Usuario"] = $personas->getusuario();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            
            if ($resultSql->RecordCount() > 0) {
                $returnPersonas = Persona::createNullPersona();
                $returnPersonas->setusuario($resultSql->Fields("Usuario"));
                $returnPersonas->setnombre($resultSql->Fields("Nombre"));
                $returnPersonas->setapellido1($resultSql->Fields("Apellido1"));
                $returnPersonas->setapellido2($resultSql->Fields("Apellido2"));
                $returnPersonas->setcorreo($resultSql->Fields("Correo"));
                $returnPersonas->setfecha_nacimiento($resultSql->Fields("Fecha_Nacimiento"));
                $returnPersonas->setdireccion($resultSql->Fields("Direccion"));
                $returnPersonas->settelefono1($resultSql->Fields("Telefono1"));
                $returnPersonas->settelefono2($resultSql->Fields("Telefono2"));
                $returnPersonas->settipo_usuario($resultSql->Fields("Tipo_Usuario"));
                $returnPersonas->setSexo($resultSql->Fields("Sexo"));
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo searchById de la clase PersonasDao), error:'.$e->getMessage());
        }
        return $returnPersonas;
    }

    //obtiene la información completa en la base de datos
    public function getAll() {

        
        try {
            $sql = sprintf("select Usuario, Nombre, Apellido1, Apellido2, Correo, Fecha_Nacimiento, Direccion, Telefono1, Telefono2, Tipo_Usuario, Sexo from Persona");
            $resultSql = $this->labAdodb->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase PersonasDao), error:'.$e->getMessage());
        }
    }
    
     public function IntoById(Persona $personas) {

        
        $returnPersonas = null;
        try {
            $sql = sprintf("select * from Persona where  Usuario = %s",
                            $this->labAdodb->Param("Usuario"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["Usuario"] = $personas->getUsuario();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            
            if ($resultSql->RecordCount() > 0) {
                $returnPersonas = Personas::createNullPersonas();
                $returnPersonas->setusuario($resultSql->Fields("Usuario"));
                $returnPersonas->setcontrasena($resultSql->Fields("Contrasena"));
                $returnPersonas->settipo_usuario($resultSql->Fields("Tipo_Usuario"));
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo searchById de la clase PersonasDao), error:'.$e->getMessage());
        }
        return $returnPersonas;
    }

}