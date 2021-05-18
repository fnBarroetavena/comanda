<?php
include "Usuario.php";
require_once "IApiObjetc.php";

class UsuarioApi implements IApiUsable{
  public static function TraerTodos($request, $response, $args){
    $usuarios = Usuario::TraerTodos();
    $newResponse = $response->withJson($usuarios, 200);  
    return $newResponse;
  }

  public static function Insertar($request, $response, $args){
    $usuario = new Usuario(...$request->getParsedBody());
    $usuario->Insertar();
    $newResponse = $response->withJson("Usuario creado correctamente.", 200);

    return $newResponse;
  }
}

?>