<?php

namespace App\Http\Controllers;

use Auth;
use App\Team;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
  public function get_teams()
 {
  if(Auth::check())
  {
    $teams = DB::table('teams')->get();

    return view('teams',['teams' => $teams]);
  }
 }

 public function add()
 {
   return view('addteams');
 }

 public function create(Request $request)
 {
   $team = new Team();
   $team->description = $request->description;
   $team->name = $request->name;
   $team->logo_url = $request->logo_url;
   $team->elo = $request->elo;
   $team->rank_tier = $team->rank_tier;
   $team->disp_days = $request->disp_days;
   $team->disp_hours = $request->disp_hours;
   $team->save();
   return redirect('/');
 }

 public function edit(Team $team)
 {
   //vérifier si rôle est manager
   if (Auth::check() && Auth::user()->id_team == $team->id)
     {
        return view('edit', compact('team'));
     }
     else {
          return redirect('/');
      }
 }

 public function update(Request $request, Team $team)
 {
   if(isset($_POST['delete'])) {
     $team->delete();
     return redirect('/');
   }
   else
   {
     $team->description = $request->description;
     $team->name = $request->name;
     $team->logo_url = $request->logo_url;
     $team->elo = $request->elo;
     $team->rank_tier = $team->rank_tier;
     $team->disp_days = $request->disp_days;
     $team->disp_hours = $request->disp_hours;
     $team->save();
     return redirect('/');
   }
 }
}
