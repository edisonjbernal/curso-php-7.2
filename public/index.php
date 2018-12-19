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
$map->get('addJobs', '/platzi/cursoPhp72/jobs/add',
[
  'controller'=>'App\Controllers\JobsController',
  'action'=>'getAddJobAction'
]
);
$map->post('saveJobs', '/platzi/cursoPhp72/jobs/add',
[
  'controller'=>'App\Controllers\JobsController',
  'action'=>'getAddJobAction'
]
);

$map->get('addUsers', '/platzi/cursoPhp72/users/add',
[
  'controller'=>'App\Controllers\UsersController',
  'action'=>'getAddUser'
]
);

$map->post('saveUsers', '/platzi/cursoPhp72/users/add',
[
  'controller'=>'App\Controllers\UsersController',
  'action'=>'postSaveUser'
]
);

$map->get('loginForm', '/platzi/cursoPhp72/login',
[
  'controller'=>'App\Controllers\AuthController',
  'action'=>'getLogin'
]
);

$map->post('authLogin', '/platzi/cursoPhp72/auth',
[
  'controller'=>'App\Controllers\AuthController',
  'action'=>'postLogin'
]
);

$matcher = $routerContainer->getMatcher(); //Compara el objeto Request con lo que tenemos en el mapa

$route = $matcher->match($request);

function printElement($job){  ?>

  <li class="work-position">
    <h5><?php echo $job->title; ?></h5>
    <p><?php echo $job->description; ?></p>
    <p>Tiempo de trabajo: <?php  echo $job->getDurationAsString(); ?></p>
    <strong>Achievements:</strong>
    <ul>
      <li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>
      <li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>
      <li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>
    </ul>
  </li>

<?php
}



if(!$route){
  echo 'No route<br/>';
}
else{
  $handlerData=$route->handler;
  $controllerName=$handlerData['controller'];
  $actionName=$handlerData['action'];

  $controller=new $controllerName;
  $response = $controller->$actionName($request);

  foreach ($response->getHeaders() as $name => $values) {
      foreach ($values as $value) {
        header(sprintf('%s: %s', $name, $value),false);
      }

  }
  http_response_code($response->getStatusCode());
  echo $response->getBody();

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
