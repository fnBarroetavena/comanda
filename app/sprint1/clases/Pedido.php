<?php
include_once __DIR__ . "/../../db/AccesoDatos.php";

class Pedido implements JsonSerializable{
  private $id;
  private $idUsuario;
  private $idMesa;
  private $idProducto;
  private $estado;
  private $cantidad;
  private $horaInicio;
  private $entregaEstimada;
  private $horaEntrega;
  
  public function __construct($idUsuario, $idMesa, $idProducto, $estado, $cantidad, $horaInicio, $entregaEstimada, $horaEntrega, $id = null)
  {
    $this->id = $id;
    $this->idUsuario = $idUsuario;
    $this->idMesa = $idMesa;
    $this->idProducto = $idProducto;
    $this->estado = $estado;
    $this->cantidad = $cantidad;
    $this->horaInicio = $horaInicio;
    $this->entregaEstimada = $entregaEstimada;
    $this->horaEntrega = $horaEntrega;
  }
  
  public function Getid(){
    return $this->id;
  }

  public function Setid($id){
    $this->id = $id;
  }

  public function GetidUsuario(){
    return $this->idUsuario;
  }

  public function SetidUsuario($idUsuario){
    $this->idUsuario = $idUsuario;
  }

  public function GetidMesa(){
    return $this->idMesa;
  }

  public function SetidMesa($idMesa){
    $this->idMesa = $idMesa;
  }

  public function GetidProducto(){
    return $this->idProducto;
  }

  public function SetidProducto($idProducto){
    $this->idProducto = $idProducto;
  }

  public function Getestado(){
    return $this->estado;
  }

  public function Setestado($estado){
    $this->estado = $estado;
  }

  public function Getcantidad(){
    return $this->cantidad;
  }

  public function Setcantidad($cantidad){
    $this->cantidad = $cantidad;
  }

  public function GethoraInicio(){
    return $this->horaInicio;
  }

  public function SethoraInicio($horaInicio){
    $this->horaInicio = $horaInicio;
  }

  public function GetentregaEstimada(){
    return $this->entregaEstimada;
  }

  public function SetentregaEstimada($entregaEstimada){
    $this->entregaEstimada = $entregaEstimada;
  }

  public function GethoraEntrega(){
    return $this->horaEntrega;
  }

  public function SethoraEntrega($horaEntrega){
    $this->horaEntrega = $horaEntrega;
  }

  public static function TraerTodos()
  {
    $accesoDatos = AccesoDatos::dameUnObjetoAcceso();
    $consulta = $accesoDatos->RetornarConsulta("SELECT * FROM pedido;");
    $consulta->execute();
    $consulta->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, __CLASS__, array("idUsuario", "idMesa", "idProducto", "estado", "cantidad", "horaInicio", "entregaEstimada", "horaEntrega", "id"));
    return $consulta->fetchAll();
  }

  public function Insertar()
  {
    $accesoDatos = AccesoDatos::dameUnObjetoAcceso();
    $consulta = $accesoDatos->RetornarConsulta("INSERT INTO pedido(idUsuario, idMesa, idProducto, estado, cantidad, horaInicio, entregaEstimada, horaEntrega)
        VALUES(:idUsuario, :idMesa, :idProducto, :estado, :cantidad, :horaInicio, :entregaEstimada, :horaEntrega)");
    $consulta->bindValue(':idUsuario', $this->idUsuario, PDO::PARAM_INT);
    $consulta->bindValue(':idMesa', $this->idMesa, PDO::PARAM_INT);
    $consulta->bindValue(':idProducto', $this->idProducto, PDO::PARAM_INT);
    $consulta->bindValue(':estado', $this->estado, PDO::PARAM_STR);
    $consulta->bindValue(':cantidad', $this->cantidad, PDO::PARAM_STR);
    $consulta->bindValue(':horaInicio', $this->horaInicio, PDO::PARAM_STR);
    $consulta->bindValue(':entregaEstimada', $this->entregaEstimada, PDO::PARAM_STR);
    $consulta->bindValue(':horaEntrega', $this->horaEntrega, PDO::PARAM_STR);

    $consulta->execute();
    return $accesoDatos->RetornarUltimoIdInsertado();
  }

  public function jsonSerialize()
  {
    return get_object_vars($this);
  }
}
