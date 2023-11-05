<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PlaceDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'feeling_id',
        'place_image',
        'place_description',
        'obsevation_image',
        'obsevation_description',
        'description',
        'latitude',
        'longitude',
    ];


    public function placeDetail()
    {
        return $this->hasOne(PlaceDetailPlace::class, 'place_detail_id', 'id');
    }

    public function observationsDetail()
    {
        return $this->hasMany(PlaceDetailObservation::class, 'place_detail_id', 'id');
    }
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function updatePlaces($place_detail,$request){
            PlaceDetailPlace::where('place_detail_id', $place_detail->id)->delete();
            if($request->place_id){
                PlaceDetailPlace::create([
                    'place_detail_id' => $place_detail->id,
                    'place_id' => $request->place_id,
                    'place_child_id' => $request->child_place_id?$request->child_place_id:NULL,
                ]);
            }
    }
    public function updateObservations($place_detail,$request){
        PlaceDetailObservation::where('place_detail_id', $place_detail->id)->delete();
        if(isset($request->observations) && is_array($request->observations) && count($request->observations)>0){
            foreach($request->observations as $obsrv){
                var_dump($obsrv);
                PlaceDetailObservation::create([
                    'place_detail_id' => $place_detail->id,
                    'observation_id' => $obsrv['observation_id'],
                    'observation_child_id' => $obsrv['child_observation_id']?$obsrv['child_observation_id']:NULL,
                    'feeling_id' => $obsrv['feeling_id'],
                ]);
            }
        }
    }
    public function updateMethod($place_detail,$request){
        $this->updatePlaces($place_detail,$request);
        $this->updateObservations($place_detail,$request);
    }

}