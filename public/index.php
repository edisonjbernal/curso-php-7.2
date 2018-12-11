<?php

ini_set('display_errors',1);
ini_set('display_starup_error',1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use Aura\Router\RouterContainer;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'cursophp',
    'username'  => 'platzi',
    'password'  => 'platziCourse23#',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

// Make this Capsule instance available globally via static methods... (optional)
//Permite hacer todo como si estuviera en el contexto global
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
//Inicializar el ORM
$capsule->bootEloquent();


$request = Zend\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);

$routerContainer = new RouterContainer(); //Contenedor de rutas
$map = $routerContainer->getMap();//Que ruta corresponde
$map->get('index', '/platzi/cursoPhp72/',
[
  'controller'=>'App\Controllers\IndexController',
  'action'=>'indexAction'
]
);
$map->get('addJobs', '/platzi/cursoPhp72/jobs/add','../addJob.php');

$matcher = $routerContainer->getMatcher(); //Compara el objeto Request con lo que tenemos en el mapa

$route = $matcher->match($request);


if(!$route){
  echo 'No route<br/>';
}
else{
  $handlerData=$route->handler;
  $controllerName=$handlerData['controller'];
  $actionName=$handlerData['action'];

  $controller=new $controllerName;
  $controller->$actionName();

  /*var_dump($route->handler);*/
}


//var_dump($route->handler);

//var_dump($request->getUri()->getPath());

/*$route=$_GET['route'] ?? '/';
if($route == '/'){
    require('../index.php');
}
elseif($route=='addJob'){
  require('../addJob.php');
}*/
