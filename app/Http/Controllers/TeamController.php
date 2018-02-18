<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Team;

class TeamController extends LFSCore
{

  public function get_teams()
  {
    $user = Auth::user();
    if(Auth::check())
    {
      $teamsRecieved = $apirequester->call("teamsInTier", array(1))
      $teams = json_decode($teamsRecieved);

      return view('teams', ['teams' => $teams])
    }
    return view('welcome',compact('user'));
  }

  public function add()
  {
    return view('add');
  }

  public function create(Request $request)
  {
    $team = new Team();
    $team->description = $request->description;
    $team->name = $request->name;
    $team->logo_url = $request->logo_url;
    $team->elo = $request->elo;
    $team->rank_tier = $request->rank_tier;
    $team->avail_days = $request->avail_days;
    $team->avail_hours = $request->avail_hours;
    $user->description = $request->description;
    $team->save();
    return redirect('/');
  }
  public function edit(Team $team)
  {
    //check if role == manager
    if (Auth::check() && Auth::user()->id_team == $team->id)
    {
        return view('edit', compact('team'));
    }
    else
    {
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
      $team->rank_tier = $request->rank_tier;
      $team->avail_days = $request->avail_days;
      $team->avail_hours = $request->avail_hours;
      $team->save();
      return redirect('/');
    }
  }
}
