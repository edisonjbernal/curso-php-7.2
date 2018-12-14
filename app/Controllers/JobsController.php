<?php
namespace App\Controllers;

use App\Models\Job;
use Respect\Validation\Validator as v;

class JobsController extends BaseController{
  public function getAddJobAction($request){


    $responseMessage = null;

    //var_dump($request->getMethod());
    //Result: string(4) "POST"

    //var_dump((string)$request->getBody());
    //REsult: string(38) "title=Arquitecto&description=de+la+web"

    //var_dump($request->getParsedBody());
    //Result: array(2) { ["title"]=> string(10) "Arquitecto" ["description"]=> string(9) "de la web" }

    if($request->getMethod() == 'POST'){


      $postData = $request->getParsedBody();

      $jobValidator = v::key('title', v::stringType()->notEmpty())
                        ->key('description', v::stringType()->notEmpty());



        try {
          $jobValidator->assert($postData);
          $job = new Job();
          $job->title = $postData['title'];
          $job->description = $postData['description'];
          $job->save();
          
          $responseMessage = 'Saved';
        } catch (\Exception $e) {
          $responseMessage=$e->getMessage();
        }

     // true


      /*$postData = $request->getParsedBody();

      $job = new Job();

      $job->title = $postData['title'];
      $job->description = $postData['description'];
      $job->save();*/
    }
    return $this->renderHTML('addJob.twig',[
      'responseMessage'=>$responseMessage
    ]);
  }


}
