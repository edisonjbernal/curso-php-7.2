<?php

namespace App\Controllers;

use App\Models\{Job,Project};

class IndexController{

  public function indexAction(){
$jobs=Job::all();

$project1 = new Project('Project 1','Description 1');

$projects=[
  $project1
];
var_dump($projects);

    //Si se utilizan comillas dobles el sistema va intentar mostrar también el valor de las variables.


    $lastName='Bernal Muñoz';
    $name='Edison Johan';
    $limitMonths=48;

    include '../views/index.php';
  }

}
