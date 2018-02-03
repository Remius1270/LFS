<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
  public function index()
 {
   $user = Auth::user();
   return view('welcome',compact('user'));
 }

 public function add()
 {
   return view('add');
 }

 public function create(Request $request)
 {
   /*$user = new User();
   $user->description = $request->description;
   $user->user_id = Auth::id();
   $user->save();
   return redirect('/');*/
 }

 public function edit(User $user)
 {
   if (Auth::check() && Auth::user()->id == $user->id_user)
   {
       return view('edit', compact('task'));
   }
   else
   {
       return redirect('/');
   }
 }

 public function update(Request $request, User $user)
 {
   if(isset($_POST['delete'])) {
     $user->delete();
     return redirect('/');
   }
   else
   {
     $user->description = $request->description;
     $user->save();
     return redirect('/');
   }
 }
}
