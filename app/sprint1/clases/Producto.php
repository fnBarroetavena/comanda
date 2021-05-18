<?php
include_once __DIR__ . "/../../db/AccesoDatos.php";

class Producto implements JsonSerializable{
    private $id;
    private $nombre;
    private $tipo;
    
    public function __construct($id, $nombre, $tipo)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->tipo = $tipo;
    }

    public function GetId(){
        return $this->id;
    }

    public function SetId($id){
        $this->id = $id;
    }

    public function GetNombre(){
        return $this->nombre;
    }

    public function SetNombre($nombre){
        $this->nombre = $nombre;
    }

    public function GetTipo(){
        return $this->tipo;
    }

    public function SetTipo($tipo){
        $this->tipo = $tipo;
    }

    public static function TraerTodos()
    {
      $accesoDatos = AccesoDatos::dameUnObjetoAcceso();
      $consulta = $accesoDatos->RetornarConsulta("SELECT * FROM producto;");
      $consulta->execute();
      $consulta->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__, array("nombre", "tipo", "id"));
      return $consulta->fetchAll();
    }
  
    public function Insertar()
    {
      $accesoDatos = AccesoDatos::dameUnObjetoAcceso();
      $consulta = $accesoDatos->RetornarConsulta("INSERT INTO usuario(nombre,tipo)
          VALUES(:nombre,:tipo)");
      $consulta->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
      $consulta->bindValue(':tipo', $this->tipo, PDO::PARAM_STR);
  
      $consulta->execute();
      return $accesoDatos->RetornarUltimoIdInsertado();
    }
  
    public function jsonSerialize()
    {
      return get_object_vars($this);
    }
}

?>