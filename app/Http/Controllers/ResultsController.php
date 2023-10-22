<?php

namespace App\Http\Controllers;
use App\Models\Candidate;
use Illuminate\Http\Request;

class ResultsController extends Controller
{
    
    public function index()
    {
        $candidates = Candidate::withCount('votes')->orderBy('votes_count', 'desc')->get();
    
        return view('results.index', compact('candidates'));
    }
    
}
