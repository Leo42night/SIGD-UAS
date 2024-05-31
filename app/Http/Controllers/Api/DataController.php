<?php

namespace App\Http\Controllers\Api;

use App\Models\Place;
use App\Http\Controllers\Controller;
use App\Http\Resources\Place as PlaceResource;

class DataController extends Controller
{
    public function index() {
        $places = Place::all();

        $geoJSONdata = $places->map(function ($place) {
            return [
                'type' => 'Feature',
                'properties' => new PlaceResource($place),
                'geometry' => [
                    'type' => 'Point',
                    'coordinates' => [
                        $place->longitude,
                        $place->latitude,

                    ],
                ],
            ];
        });

        return response()->json([
            'type' => 'FeatureCollection',
            'features' => $geoJSONdata,
        ]);
    }
    public function places()
    {
        $places = Place::latest()->get();
        return datatables()->of($places)
            ->addColumn('action', 'places.action')
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->toJson();
    }
}
