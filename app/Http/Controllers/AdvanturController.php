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
                $query->take(3); // Limit the number of photos to 3
            }])
            ->join('destinations', 'adventures.destination_id', '=', 'destinations.id')
            ->select('adventures.*', 'destinations.*')
            ->take(3) // Limit the number of adventures to 3
            ->get();
    
        // Count the total number of adventures
        $totalAdventures = Adventure::count();
    
        // Count the total number of destinations
        $totalDestinations = Destination::count();
    
        // Get the number of adventures per destination
        $adventuresPerDestination = Destination::withCount('adventures')->get();
    
        // Dump and die to inspect the result
        // dd([
        //     'limitedAdventures' => $limitedAdventuresWithDestinationAndLimitedPhotos->toArray(),
        //     'totalAdventures' => $totalAdventures,
        //     'totalDestinations' => $totalDestinations,
        //     'adventuresPerDestination' => $adventuresPerDestination,
        // ]);
    
        // Pass the data to the view
        return view('welcome', [
            "adventures" => $limitedAdventuresWithDestinationAndLimitedPhotos->toArray(),
            'totalAdventures' => $totalAdventures,
            'totalDestinations' => $totalDestinations,
            'adventuresPerDestination' => $adventuresPerDestination,
        ]);
    }
    
    




    public function showAllAdventures($sort = null)
    {
        $sort = $sort ?? 'All';
    
        $adventuresQuery = Adventure::with(['photos' => function ($query) {
                $query->take(3);
            }])
            ->join('destinations', 'adventures.destination_id', '=', 'destinations.id');
    
        if ($sort == 'Récentes') {
            $adventuresQuery->orderBy('adventures.created_at', 'desc');
        } elseif ($sort == 'Anciennes') {
            $adventuresQuery->orderBy('adventures.created_at', 'asc');
        }
    
        $adventures = $adventuresQuery->get();
        // dd($adventures); 
        return view('Destination', ["adventures" => $adventures, "sort" => $sort]);
    }


    public function filterByDestination(Request $request)
    {
        // Get the selected destination ID from the request
        $selectedDestinationId = $request->input('destination');
    
        // Build the query to fetch adventures
        $adventuresQuery = Adventure::with(['photos' => function ($query) {
            $query->take(3); // Limit the number of photos to 3
        }]);
    
        // If a destination is selected, filter by the destination
        if ($selectedDestinationId) {
            $adventuresQuery->where('destination_id', $selectedDestinationId);
        }
    
        // Fetch adventures
        $filteredAdventures = $adventuresQuery->get();
    
        // Pass the filtered adventures and selected destination ID to the view
        return view('Destination', [
            'adventures' => $filteredAdventures,
            'selectedDestinationId' => $selectedDestinationId,
        ]);
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
