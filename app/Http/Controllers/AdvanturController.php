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
        // Retrieve limited adventures with their associated destination details and limited photos using joins
        $limitedAdventuresWithDestinationAndLimitedPhotos = Adventure::with(['photos' => function ($query) {
                $query->take(3);
            }])
            ->join('destinations', 'adventures.destination_id', '=', 'destinations.id')
            ->select('adventures.*', 'destinations.*')
            ->take(3)
            ->get();
    
        // Dump and die to inspect the result
        // dd($limitedAdventuresWithDestinationAndLimitedPhotos);
    
        // If you want to continue with passing data to the view, you can do so after the dd() statement
        $adventuresArray = $limitedAdventuresWithDestinationAndLimitedPhotos->toArray();
    
        // Pass the data to the view
        return view('welcome', ["adventures" => $adventuresArray]);
    }




    public function showAllAdventures($sort = null)
    {
        $sort = $sort ?? 'All';
    
        $adventuresQuery = Adventure::with(['destination', 'photos']);
    
        if ($sort == 'Récentes') {
            $adventuresQuery->orderBy('created_at', 'asc');
        } elseif ($sort == 'Anciennes') {
            $adventuresQuery->orderBy('created_at', 'desc');
        }
    
        $adventures = $adventuresQuery->get();
    
        return view('Destination', ["adventures" => $adventures, "sort" => $sort]);
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
