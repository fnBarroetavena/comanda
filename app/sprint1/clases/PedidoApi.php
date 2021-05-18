<?php
include "Pedido.php";
require_once "IApiObjetc.php";

class PedidoApi implements IApiUsable{
  public static function TraerTodos($request, $response, $args){
    $pedidos = Pedido::TraerTodos();
    $newResponse = $response->withJson($pedidos, 200);  
    return $newResponse;
  }

  public static function Insertar($request, $response, $args){
    $pedido = new Pedido(...$request->getParsedBody());
    $pedido->Insertar();
    $newResponse = $response->withJson("Pedido creado correctamente.", 200);

    return $newResponse;
  }
}

?>