<?php

namespace App\Http\Controllers;

use App\Models\Adventure;
use App\Models\Destination;
use App\Models\Photo;
use Illuminate\Http\Request;

class AdvanturController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all adventures with their associated photos
        $adventuresWithPhotos = Adventure::with('photos')->get();
    
        // Convert the adventures collection to an array
        $adventuresArray = $adventuresWithPhotos->toArray();
    
        // Pass the data to the view
        return view('welcome', ["adventures" => $adventuresArray]);
    }
    
    
    
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Adventure $adventure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Adventure $adventure)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Adventure $adventure)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Adventure $adventure)
    {
        //
    }
  
}
