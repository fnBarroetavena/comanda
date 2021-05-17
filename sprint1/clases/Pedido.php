<?php
// "pedido": {
//     "id": "int", //auto
//     "idUsuario": "int",
//     "idMesa": "int",
//     "idProducto": "int",
//     "nombreCliente": "string",
//     "estado": "string", //["pendiente", "en preparacion", "listo para servir", "entregado", "cancelado"]
//     "cantidad": "int",
//     "horaInicio": "date",
//     "entregaEstimada": "date",
//     "horaEntrega": "date"
// }
class Usuario{
  private $id;
  private $idUsuario;
  private $idMesa;
  private $idProducto;
  private $nombreCliente;
  private $estado;
  private $cantidad;
  private $horaInicio;
  private $entregaEstimada;
  private $horaEntrega;
  
  public function __construct($id, $idUsuario, $idMesa, $idProducto, $nombreCliente, $estado, $cantidad, $horaInicio, $entregaEstimada, $horaEntrega)
  {
    $this->id = $id;
    $this->idUsuario = $idUsuario;
    $this->idMesa = $idMesa;
    $this->idProducto = $idProducto;
    $this->nombreCliente = $nombreCliente;
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

  public function GetnombreCliente(){
    return $this->nombreCliente;
  }

  public function SetnombreCliente($nombreCliente){
    $this->nombreCliente = $nombreCliente;
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
}
