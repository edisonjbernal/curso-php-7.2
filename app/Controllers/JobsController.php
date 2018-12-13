<?php
namespace App\Controllers;

use App\Models\Job;

class JobsController{
  public function getAddJobAction($request){

    //var_dump($request->getMethod());
    //Result: string(4) "POST"

    //var_dump((string)$request->getBody());
    //REsult: string(38) "title=Arquitecto&description=de+la+web"

    //var_dump($request->getParsedBody());
    //Result: array(2) { ["title"]=> string(10) "Arquitecto" ["description"]=> string(9) "de la web" }

    if($request->getMethod() == 'POST'){
      $postData = $request->getParsedBody();

      $job = new Job();

      $job->title = $postData['title'];
      $job->description = $postData['description'];
      $job->save();
    }
    include '../views/addJob.php';
  }


}
