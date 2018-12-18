<?php
namespace App\Controllers;

use App\Models\User;
use Respect\Validation\Validator as v;

class UsersController extends BaseController{

  public function getAddUser($request){

    return $this->renderHTML('addUser.twig');

  }

  public function postSaveUser($request){
    $responseMessage = null;

      if($request->getMethod() == 'POST'){

        $postData = $request->getParsedBody();
        $userValidator = v::key('email', v::stringType()->notEmpty());

                          try {
                            $userValidator->assert($postData);
                            $user = new User();
                            $user->email = $postData['email'];
                            $user->password = password_hash($postData['password'],PASSWORD_DEFAULT);
                            $user->save();

                            $responseMessage = 'Saved user '.$postData['email'];
                          } catch (\Exception $e) {
                            $responseMessage=$e->getMessage();
                          }
                          return $this->renderHTML('addUser.twig',[
                            'responseMessage'=>$responseMessage
                          ]);
      }

  }


  /*  $responseMessage = null;

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
          $userValidator->assert($postData);
          $user = new User();
          $user->title = $postData['email'];
          $user->description = pasword_hash($postData['password'],PASSWORD_DEFAULT);
          $user->save();


          //Files upload


          $responseMessage = 'Saved';
        } catch (\Exception $e) {
          $responseMessage=$e->getMessage();
        }

     // true


      /*$postData = $request->getParsedBody();

      $job = new Job();

      $job->title = $postData['title'];
      $job->description = $postData['description'];
      $job->save();
    }
    return $this->renderHTML('addJob.twig',[
      'responseMessage'=>$responseMessage
    ]);
  }*/


}
