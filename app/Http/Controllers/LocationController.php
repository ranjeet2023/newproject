<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\City; 
use App\Models\Country; 
use App\Models\StoreLocation; 

class LocationController extends Controller
{

    public function index(){
        $countries = Country::get();
        return view('form')->with('countries', $countries);
    }
    
    public function getStates(Request $request)
    {
        $country_id = $request->input('country_id');
        $states = State::where('country_id', $country_id)->get();
        return response()->json($states);
    }

    public function getCities(Request $request)
    {
        $state_id = $request->input('state_id');
        $cities = City::where('state_id', $state_id)->get();
        return response()->json($cities);
    }

    public function storeLocation(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'country' => 'required',
            'state' => 'required',
        ]);
        
        StoreLocation::create([
            'name' => $request->input('name'),
            'discription' => $request->input('discription'),
            'country' => $request->input('country'),
            'state' => $request->input('state'),
            'city' => $request->input('city'),
        ]);
    
        return redirect()->back()->with('message', 'Data inserted successfully');
    }
    
    public function location(){
        $location = StoreLocation::get();
        $countries = Country::get();
        $states = State::get();
        $cities = City::get();
        return view('index')->with([
            'location' => $location,
            'countries' => $countries,
            'states' => $states,
            'cities' => $cities,
        ]);
    }
    
}
