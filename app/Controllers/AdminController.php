<?php

namespace App\Controllers;

use App\Models\{Job,Project};

class AdminController extends BaseController{

  public function getIndexAdmin(){

    return $this->renderHTML('indexAdmin.twig');
  }

}
