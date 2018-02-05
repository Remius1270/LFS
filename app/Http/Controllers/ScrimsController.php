<?php

namespace App\Http\Controllers;
use Auth;
use App\Scrim;
use App\Team;
use Illuminate\Http\Request;

class ScrimsController extends Controller
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

 public function askscrim($team_id,$scrim_date)
 {
   $scrim = new Scrim();
   $scrim->id_team_asked = $team_id;
   $scrim->id_team_requesting = Auth::user()->id_team;
   $scrim->scrim_date = $scrim_date;
   $scrim->scrim_time = 0;
   $scrim->status = "pending";
   $scrim->save();

   $team = new TeamsController();
   $teams = $team->get_teams();
   //add notification to requested teams
   return view('teams',[
     'scrim' => 'true',
     'team' => $teams
   ]);
 }

 public function create(Request $request)
 {
   $task = new Task();
   $task->description = $request->description;
   $task->user_id = Auth::id();
   $task->save();
   return redirect('/');
 }

 public function edit(Task $task)
 {

   if (Auth::check() && Auth::user()->id == $task->user_id)
     {
             return view('edit', compact('task'));
     }
     else {
          return redirect('/');
      }
 }

 public function update(Request $request, Task $task)
 {
   if(isset($_POST['delete'])) {
     $task->delete();
     return redirect('/');
   }
   else
   {
     $task->description = $request->description;
     $task->save();
     return redirect('/');
   }
 }
}
