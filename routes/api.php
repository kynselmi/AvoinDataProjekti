<?php

use Illuminate\Http\Request;
use App\Bird;
use App\Location;
use App\Observation;
use App\Person;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::get('birds/{id?}', function (Request $request) {
    $id = $request->input('id');
    $birdname = $request->input('birdname');
    $species = $request->input('species');

    if (isset($id)) {
        $birds = Bird::find($id);
    } else {
        $birds = DB::table('birds')
            ->when($birdname, function ($birdquery) use ($birdname) {
                return $birdquery->where('BirdName', $birdname);
            })
            ->when($species, function ($speciesquery) use ($species) {
                return $speciesquery->where('Species', $species);
            })->get();
    }

    return Response::json([
        'error' => false,
        'birds' => $birds,
        'status_code' => 200
    ]);
});

Route::get('locations/{id?}', function (Request $request) {
    $id = $request->input('id');
    $locationname = $request->input('locationname');
    $lat = $request->input('lat');
    $lng = $request->input('lng');


    if (isset($id)) {
        $locations = Location::find($id);
    } else {
        $locations = DB::table('locations')
            ->when($locationname, function ($locationquery) use ($locationname) {
                return $locationquery->where('LocationName', $locationname);
            })
            ->when($lat, function ($latquery) use ($lat) {
                return $latquery->where('Lat', $lat);
            })
            ->when($lng, function ($lngquery) use ($lng) {
                return $lngquery->where('LocationName', $lng);
            })->get();
    }
    return Response::json([
        'error' => false,
        'locations' => $locations,
        'status_code' => 200,
    ]);
});


Route::get('persons/{id?}', function (Request $request) {
    $id = $request->input('id');
    $firstName = $request->input('firstname');
    $lastName = $request->input('lastname');
    $street = $request->input('street');
    $stnum = $request->input('stnum');
    $city = $request->input('city');
    $zip = $request->input('zip');
    $phone = $request->input('phone');
    $professional = $request->input('professional');

    if ($id == null) {
        $persons = \DB::table('persons')
            ->when($firstName, function($query) use ($firstName) {
                return $query->where('FirstName', $firstName);
            })
            ->when($lastName, function($query) use ($lastName) {
                return $query->where('LastName', $lastName);
            })
            ->when($street, function($query) use ($street) {
                return $query->where('Street', $street);
            })
            ->when($stnum, function($query) use ($stnum) {
                return $query->where('Streetnumber', $stnum);
            })
            ->when($city, function($query) use ($city){
                return $query->where('City', $city);
            })
            ->when($zip, function($query) use ($zip){
                return $query->where('ZipCode', $zip);
            })
            ->when($phone, function($query) use ($phone){
                return $query->where('Phonenumber', $phone);
            })
            ->when($professional, function($query) use ($professional){
                return $query->where('IsProfessional', $professional);
            })
            ->get();
    } else {
        $persons = Person::find($id);
    }

    return Response::json([
        'error' => false,
        'persons' => $persons,
        'status_code' => 200
    ]);
});

Route::get('observations/{id?}', 'ApiObservationController@observationRequest');
