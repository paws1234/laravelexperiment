<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;


class CandidatesController extends Controller
{
  
    public function index()
    {
        $candidates = Candidate::all(); 
        return view('candidates.index', compact('candidates')); 
    }
    
    public function create()
    {
        return view('candidates.create'); 
    }
    
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
    
        
        Candidate::create($validatedData);
    
        return redirect()->route('candidates.index')->with('success', 'Candidate created successfully');
    }
    
    public function edit($id)
    {
        $candidate = Candidate::findOrFail($id); 
        return view('candidates.edit', compact('candidate')); 
    }
    
    public function update(Request $request, $id)
    {
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
    
        $candidate = Candidate::findOrFail($id); 
        $candidate->update($validatedData); 
    
        return redirect()->route('candidates.index')->with('success', 'Candidate updated successfully');
    }
    
    public function destroy($id)
    {
        $candidate = Candidate::findOrFail($id); 
        $candidate->delete(); 
    
        return redirect()->route('candidates.index')->with('success', 'Candidate deleted successfully');
    }
    
}
