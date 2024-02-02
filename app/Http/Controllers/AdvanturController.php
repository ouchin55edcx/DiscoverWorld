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
        $limitedAdventuresWithDestinationAndLimitedPhotos = Adventure::with('photos')
        ->latest('adventures.created_at')
            ->limit(3)->get();
    
        $totalAdventures = Adventure::count();
    
        $totalDestinations = Destination::count();
    
        $adventuresPerDestination = Destination::withCount('adventures')->get();

        $limitedAdventuresWithDestinationAndLimitedPhotos =
            cache()->remember(
                "adventure_id",
                30,
                fn () =>
                $limitedAdventuresWithDestinationAndLimitedPhotos
            );
        return view('welcome', [
            "adventures" => $limitedAdventuresWithDestinationAndLimitedPhotos,
            'totalAdventures' => $totalAdventures,
            'totalDestinations' => $totalDestinations,
            'adventuresPerDestination' => $adventuresPerDestination,
            
        ]);
    }
    
    public function showAllAdventures($sort  = null)
    {
        $sort = $sort ?? 'All';
    
        $adventuresQuery = Adventure::with('photos','destination');
    
        if ($sort == 'Récentes') {
            $adventuresQuery->orderByDesc('adventures.created_at');
        } elseif ($sort == 'Anciennes') {
            $adventuresQuery->orderBy('adventures.created_at');
        }
    
        $adventuresQuery = $adventuresQuery->get();
       
        
        return view('Destination', [
            "adventures" => $adventuresQuery,
             "sort" => $sort,
             "Destinations" => Destination::all(),
            ]);
    }

    public function DisplayCountry(){
        $destinations = Destination::all();
        // dd($destinations);   
        return view('Add_Adventure', ['destinations' => $destinations]);
    }
    


    public function filterByDestination(Request $request)
    {
        $selectedDestinationId = $request->input('destination');
    
        $adventuresQuery = Adventure::with('photos');
    
        if ($selectedDestinationId) {
            $adventuresQuery->where('destination_id', $selectedDestinationId);
        }
    
        $filteredAdventures = $adventuresQuery->get();
    
        return view('Destination', [
            "Destinations" => Destination::all(),
            'adventures' => $filteredAdventures,
            'selectedDestinationId' => $selectedDestinationId,
        ]);
    }
    // public function getAllDestinations()
    // {
    //     $destinations = Destination::all();



    //     return view('Destination', ['destinations' => $destinations]);
    // }


    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'placeName' => 'required',
            'tips' => 'required',
            'destination_id' => 'required',
        ]);
       
        
        $adventure = Adventure::create($formFields);
        //  dd($request->file('image'));
            if ($request->file('image')) {
                foreach ($request->file('image') as $image) {
                   
                    $filename = date('YmdHi') . $image->getClientOriginalName();
                    $image->move(public_path('storage/images'), $filename);
                    $data['image'] = $filename;
                    $path = "storage/images/" . $filename;
            
                    Photo::create([
                        'url' => $path,
                        'adventure_id'=>$adventure->id
                    ]);
                }
                
            }
            // dd($formFields);
            return redirect('/');
        
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
