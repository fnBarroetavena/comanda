<?php
include_once __DIR__ . "/../../db/AccesoDatos.php";

class Mesa implements JsonSerializable{
    private $id;
    private $estado;
    private $foto;
    private $cuenta;
    private $nombreCliente;
    
    public function __construct($estado, $cuenta, $nombreCliente, $foto = null, $id = null)
    {
        $this->id = $id;
        $this->estado = $estado;
        $this->foto = $foto;
        $this->cuenta = $cuenta;
        $this->nombreCliente = $nombreCliente;
    }

    public function GetId(){
        return $this->id;
    }

    public function SetId($id){
        $this->id = $id;
    }

    public function GetEstado(){
        return $this->estado;
    }

    public function SetEstado($estado){
        $this->estado = $estado;
    }

    public function GetFoto(){
        return $this->foto;
    }

    public function SetFoto($foto){
        $this->foto = $foto;
    }

    public function GetCuenta(){
        return $this->cuenta;
    }

    public function SetCuenta($cuenta){
        $this->cuenta = $cuenta;
    }

    public function GetnombreCliente(){
      return $this->nombreCliente;
    }
  
    public function SetnombreCliente($nombreCliente){
      $this->nombreCliente = $nombreCliente;
    }

    public static function TraerTodos()
    {
      $accesoDatos = AccesoDatos::dameUnObjetoAcceso();
      $consulta = $accesoDatos->RetornarConsulta("SELECT * FROM mesa;");
      $consulta->execute();
      $consulta->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__, array("estado", "cuenta", "nombreCliente", "foto", "id"));
      return $consulta->fetchAll();
    }
  
    public function Insertar()
    {
      $accesoDatos = AccesoDatos::dameUnObjetoAcceso();
      $consulta = $accesoDatos->RetornarConsulta("INSERT INTO mesa(estado, cuenta, nombreCliente, foto)
          VALUES(:estado,:cuenta,:nombreCliente,:foto)");
      $consulta->bindValue(':estado', $this->estado, PDO::PARAM_STR);
      $consulta->bindValue(':cuenta', $this->cuenta, PDO::PARAM_STR);
      $consulta->bindValue(':nombreCliente', $this->nombreCliente, PDO::PARAM_STR);
      $consulta->bindValue(':foto', $this->foto, PDO::PARAM_STR);
  
      $consulta->execute();
      return $accesoDatos->RetornarUltimoIdInsertado();
    }
  
    public function jsonSerialize()
    {
      return get_object_vars($this);
    }
}

?>