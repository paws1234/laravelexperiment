<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Vote;
use Illuminate\Http\Request;

class UserController extends Controller
{
   

public function dashboard()
{
    $candidates = Candidate::all();
    return view('voter.dashboard', compact('candidates'));
}


public function __construct()
{
    $this->middleware('auth');
}
public function vote(Candidate $candidate)
{
    $user = auth()->user();

   
    if ($user->hasVoted()) {
        return redirect()->route('user.dashboard')->with('error', 'You have already voted.');
    }

    $vote = new Vote();
    $vote->user_id = $user->id;
    $vote->candidate_id = $candidate->id;
    $vote->save();

    return redirect()->route('user.dashboard')->with('success', 'Vote cast successfully.');
}

}
