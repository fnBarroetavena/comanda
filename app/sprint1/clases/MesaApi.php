<?php
include "Mesa.php";
require_once "IApiObjetc.php";

class MesaApi implements IApiUsable{
  public static function TraerTodos($request, $response, $args){
    $mesas = Mesa::TraerTodos();
    $newResponse = $response->withJson($mesas, 200);  
    return $newResponse;
  }

  public static function Insertar($request, $response, $args){
    $mesa = new Mesa(...$request->getParsedBody());
    $mesa->Insertar();
    $newResponse = $response->withJson("Mesa creada correctamente.", 200);

    return $newResponse;
  }
}

?>