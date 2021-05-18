<?php
include "Producto.php";
require_once "IApiObjetc.php";

class ProductoApi implements IApiUsable{
  public static function TraerTodos($request, $response, $args){
    $productos = Producto::TraerTodos();
    $newResponse = $response->withJson($productos, 200);  
    return $newResponse;
  }

  public static function Insertar($request, $response, $args){
    $producto = new Producto(...$request->getParsedBody());
    $producto->Insertar();
    $newResponse = $response->withJson("Producto creado correctamente.", 200);

    return $newResponse;
  }
}

?>