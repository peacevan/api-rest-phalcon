<?php
declare(strict_types=1);
use Phalcon\Http\Response;
class UsersController extends ControllerBase
{

    public function indexAction()
    {
       /*$users = User::find();
       $usersArray = [];
       foreach ($users as $user) {
           $usersArray[] = $user->toArray();
       }*/
       $usersArray=array(
        ["id"=>1,
        "name"=>"John",
        "surname"=>"Doe",
        "email"=>"jdoe@me.com"],

       );
       $response = new Response();
   
       $response = $response;
       $response->setJsonContent($usersArray);
       return $response;
   }
   
}

