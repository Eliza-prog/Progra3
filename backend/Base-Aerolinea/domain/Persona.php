<?php

require_once("baseDomain.php");

/**
 * @author ChGari
 * Date Last  modification: Tue Jul 07 16:42:51 CST 2020
 * Comment: It was created
 *
 */
class Persona extends BaseDomain implements \JsonSerializable{

    //attributes
    private $usuario;
    private $contrasena;
    private $nombre;
    private $apellido1;
    private $apellido2;
    private $correo;
    private $fecha_nacimiento;
    private $direccion;
    private $telefono1;
    private $telefono2;
    private $tipo_usuario;
    private $sexo;

    //constructors
    public function __construct() {
        parent::__construct();
    }

    public static function createNullPersona() {
        $instance = new self();
        return $instance;
    }

    public static function createPersona($usuario, $contrasena, $nombre, $apellido1, $apellido2, $correo, $fecha_nacimiento, $direccion, $telefono1, $telefono2, $tipo_usuario, $sexo) {
        $instance = new self();
        $instance->usuario              = $usuario;
        $instance->contrasena           = $contrasena;
        $instance->nombre               = $nombre;
        $instance->apellido1            = $apellido1;
        $instance->apellido2            = $apellido2;
        $instance->correo               = $correo;
        $instance->fecha_nacimiento     = $fecha_nacimiento;
        $instance->direccion            = $direccion;
        $instance->telefono1            = $telefono1;
        $instance->telefono2            = $telefono2;
        $instance->tipo_usuario         = $tipo_usuario;
        $instance->sexo                 = $sexo;
        return $instance;
    }
    /****************************************************************************/
    //properties
    /****************************************************************************/
    public function getusuario() {
        return $this->usuario;
    }

    public function setusuario($usuario) {
        $this->usuario = $usuario;
    }
    
    public function getcontrasena() {
        return $this->contrasena;
    }

    public function setcontrasena($contrasena) {
        $this->contrasena = $contrasena;
    }

    /****************************************************************************/

    public function getnombre() {
        return $this->nombre;
    }

    public function setnombre($nombre) {
        $this->nombre = $nombre;
    }

    /****************************************************************************/

    public function getapellido1() {
        return $this->apellido1;
    }

    public function setapellido1($apellido1) {
        $this->apellido1 = $apellido1;
    }

    /****************************************************************************/

    public function getapellido2() {
        return $this->apellido2;
    }

    public function setapellido2($apellido2) {
        $this->apellido2 = $apellido2;
    }

    /****************************************************************************/

    public function getfecha_nacimiento() {
        return $this->fecha_nacimiento;
    }
    public function setfecha_nacimiento($fecha_nacimiento) {
        $this->fecha_nacimiento = $fecha_nacimiento;
    }
    
    public function getcorreo() {
        return $this->correo;
    }
    public function setcorreo($correo) {
        $this->correo = $correo;
    }
    
    public function setdireccion($direccion) {
        $this->direccion = $direccion;
    }
    
     public function getdireccion() {
        return $this->direccion;
    }
    
     public function gettelefono1() {
        return $this->telefono1;
    }

    public function settelefono1($telefono1) {
        $this->telefono1 = $telefono1;
    }
     public function gettelefono2() {
        return $this->telefono2;
    }

    public function settelefono2($telefono2) {
        $this->telefono2 = $telefono2;
    }
     public function gettipo_usuario() {
        return $this->tipo_usuario;
    }

    public function settipo_usuario($tipo_usuario) {
        $this->tipo_usuario = $tipo_usuario;
    }

    /****************************************************************************/

    public function getsexo() {
        return $this->sexo;
    }

    public function setsexo($sexo) {
        $this->sexo = $sexo;
    }

    /****************************************************************************/
    //Convertir el obj a JSON
    /****************************************************************************/
    

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}