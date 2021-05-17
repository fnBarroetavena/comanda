<?php
include "Usuario.php";

class UsuarioApi{
  public static function traerUsuarios(){
    var_dump(Usuario::TraerTodos());
  }

  public static function insertUsuario(\Slim\Http\Request $req){
    $usuario = new Usuario(...$req->getParsedBody());

    var_dump($usuario->Insertar());
  }
}

?>