<?php
include_once __DIR__ . "/../../db/AccesoDatos.php";

class Usuario implements JsonSerializable
{
  private $id;
  private $nombre;
  private $tipo;
  private $estado;
  private $fechaIngreso;

  public function __construct($nombre, $tipo, $estado, $fechaIngreso, $id = null)
  {
    $this->id = $id;
    $this->nombre = $nombre;
    $this->tipo = $tipo;
    $this->estado = $estado;
    $this->fechaIngreso = $fechaIngreso;
  }

  public function GetId()
  {
    return $this->id;
  }

  public function SetId($id)
  {
    $this->id = $id;
  }

  public function GetNombre()
  {
    return $this->nombre;
  }

  public function SetNombre($nombre)
  {
    $this->nombre = $nombre;
  }

  public function GetTipo()
  {
    return $this->tipo;
  }

  public function SetTipo($tipo)
  {
    $this->tipo = $tipo;
  }

  public function GetEstado()
  {
    return $this->estado;
  }

  public function SetEstado($estado)
  {
    $this->estado = $estado;
  }

  public function GetFechaIngreso()
  {
    return $this->fechaIngreso;
  }

  public function SetFechaIngreso($fechaIngreso)
  {
    $this->fechaIngreso = $fechaIngreso;
  }

  public static function TraerTodos()
  {
    $accesoDatos = AccesoDatos::dameUnObjetoAcceso();
    $consulta = $accesoDatos->RetornarConsulta("SELECT * FROM usuario;");
    $consulta->execute();
    $consulta->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__, array("nombre", "tipo", "estado", "fechaIngreso", "id"));
    return $consulta->fetchAll();
  }

  public function Insertar()
  {
    $accesoDatos = AccesoDatos::dameUnObjetoAcceso();
    $consulta = $accesoDatos->RetornarConsulta("INSERT INTO usuario(nombre,tipo,estado,fechaIngreso)
        VALUES(:nombre,:tipo,:estado,:fechaIngreso)");
    $consulta->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
    $consulta->bindValue(':tipo', $this->tipo, PDO::PARAM_STR);
    $consulta->bindValue(':estado', $this->estado, PDO::PARAM_STR);
    $consulta->bindValue(':fechaIngreso', $this->fechaIngreso, PDO::PARAM_STR);

    $consulta->execute();
    return $accesoDatos->RetornarUltimoIdInsertado();
  }

  public function jsonSerialize()
  {
    return get_object_vars($this);
  }
}
