<?php

namespace App\Controllers;

use App\Models\{Job,Project};

class IndexController extends BaseController{

  public function indexAction(){
$jobs=Job::all();

$project1 = new Project('Project 1','Description 1');

$projects=[
  $project1
];
var_dump($projects);

    //Si se utilizan comillas dobles el sistema va intentar mostrar también el valor de las variables.


    $name='Edison Johan Bernal Muñoz';
    $limitMonths=48;

    return $this->renderHTML('index.twig',[
      'name'=>$name,
      'jobs'=>$jobs
    ]);
  }

}
