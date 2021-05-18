<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/sprint1/clases/UsuarioApi.php';
require_once __DIR__ . '/sprint1/clases/ProductoApi.php';
require_once __DIR__ . '/sprint1/clases/MesaApi.php';
require_once __DIR__ . '/sprint1/clases/PedidoApi.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

/*
¡La primera línea es la más importante! A su vez en el modo de 
desarrollo para obtener información sobre los errores
 (sin él, Slim por lo menos registrar los errores por lo que si está utilizando
  el construido en PHP webserver, entonces usted verá en la salida de la consola 
  que es útil).

  La segunda línea permite al servidor web establecer el encabezado Content-Length, 
  lo que hace que Slim se comporte de manera más predecible.
*/

$app = new \Slim\App(["settings" => $config]);

$app->get('/', function() {echo "Bienvenido a 'La Comanda'.";});

/*LLAMADA A METODOS DE INSTANCIA DE UNA CLASE*/
$app->group('/usuario', function () {
    $this->get('[/]', \UsuarioApi::class . ':TraerTodos');
    $this->post('[/]', \UsuarioApi::class . ':Insertar');
});

$app->group('/producto', function () {
    $this->get('[/]', \ProductoApi::class . ':TraerTodos');
    $this->post('[/]', \ProductoApi::class . ':Insertar');
});

$app->group('/mesa', function () {
    $this->get('[/]', \MesaApi::class . ':TraerTodos');
    $this->post('[/]', \MesaApi::class . ':Insertar');
});

$app->group('/pedido', function () {
    $this->get('[/]', \PedidoApi::class . ':TraerTodos');
    $this->post('[/]', \PedidoApi::class . ':Insertar');
});

$app->run();