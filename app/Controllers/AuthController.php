<?php
namespace App\Controllers;

use App\Models\User;
use Respect\Validation\Validator as v;
use Zend\Diactoros\Response\RedirectResponse;

class AuthController extends BaseController{

  public function getLogin($request){

    return $this->renderHTML('login.twig');

  }

  public function postLogin($request){
    $responseMessage = null;

      if($request->getMethod() == 'POST'){

        $postData = $request->getParsedBody();
        $user = User::where('email',$postData['email'])->first();

        if($user){

          if(password_verify($postData['password'],$user->password)){
            $_SESSION['userId'] = $user->id;
            return new RedirectResponse('/platzi/cursoPhp72/admin');
          }else{

            $responseMessage= 'Bad credentials';

          }
        }
        else{
          $responseMessage= 'Bad credentials';
        }

        return $this->renderHTML('login.twig',[
          'responseMessage'=>$responseMessage
        ]);

      }



  }

  public function getLogout($request){
    unset($_SESSION['userId']);
    return new RedirectResponse('/platzi/cursoPhp72/login');

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
