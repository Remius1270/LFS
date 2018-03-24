<?php

namespace App\Http\Controllers;
use App\User;
use GuzzleHttp\Client;

use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function checkLogin()
    {
      if(!isset($_SESSION['user']) || empty($_SESSION['user']))
      {
        return false;
      }
      else{
        return true;
      }
    }

    public function login(Request $request)
    {
      $email = $request->input('email');
      $password = $request->input('password');

      $client = new Client();
      $res = $client->request('GET', '139.59.151.43/login?email=admin@example.com&password=abc123', [
        'headers' => [
          'key' => '7b14r3oV2LHhknbp5qCGDgsT0rh3JVZlUDgPJKNBPKOg'
        ]
      ]);

      $_SESSION['user'] =  json_decode($res->getBody());

    }

    public function getHome()
    {
      if($this->checkLogin())
      {
        return view('home');
      }
      else{
        return view('login');
      }
    }

    public function getEdit()
    {
      if($this->checkLogin())
      {
        return view('editUser');
      }
      else{
        return view('login');
      }
    }


}
