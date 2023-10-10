<?php

namespace App\Http\Livewire;

use App\Models\PlaceDetails;
use App\Models\User;
use Livewire\Component;

class Filter extends Component
{
    // public $places;

    public $selected_places = [];

    public function select_place($id)
    {
        array_push($this->selected_places, $id);
    }

    public function updateMap()
    {

        foreach ($this->selected_places as $value) {

            $data =  PlaceDetails::where('id', $value)->first();

            // dd($data);

            if ($data->is_home == 1) {
                PlaceDetails::where('id', $value)->update([
                    'is_home' => 0
                ]);
            }
            if ($data->is_home == 0) {
                PlaceDetails::where('id', $value)->update([
                    'is_home' => 1
                ]);
            }
        }

        $this->emit('success', 'Map updated successfully');
    }

    public function render()
    {
        $userid = backpack_auth()->user()->id;

        // $places = PlaceDetails::where('user_id', $userid)->where()
         
    //     $places = PlaceDetails::where('user_id', $userid)
    // ->select('place_id', 'observation_id')
    // ->distinct()
    // ->orderBy('id', 'desc')
    // ->get();

    $placeAndObservationIds = PlaceDetails::where('user_id', $userid)
    ->where(function ($query) {
        $query->whereNotNull('place_id')
              ->orWhereNotNull('observation_id');
    })
    ->distinct()
    ->pluck('place_id')
    ->concat(PlaceDetails::where('user_id', $userid)
        ->whereNotNull('observation_id')
        ->distinct()
        ->pluck('observation_id'))
    ->unique();

dd($placeAndObservationIds);



    foreach($observation_ids as $p){
        var_dump($p->observation->name);
        echo '<br>';
        echo '<br>';
        echo '<br>';
    }
    

    die();


        return view('livewire.filter', compact('places'));
    }
}