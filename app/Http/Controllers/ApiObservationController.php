<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Http\Response;

class ApiObservationController extends Controller
{
    public function observationRequest(Request $request)
    {

        $id = $request->input('id');
        $birdname = $request->input('birdname');
        $species = $request->input('species');
        $firstName = $request->input('firstname');
        $lastName = $request->input('lastname');
        $street = $request->input('street');
        $stnum = $request->input('stnum');
        $city = $request->input('city');
        $zip = $request->input('zip');
        $phone = $request->input('phone');
        $professional = $request->input('professional');
        $locationname = $request->input('locationname');
        $lat = $request->input('lat');
        $lng = $request->input('lng');

        if (isset($id)) {
            $observations = Observation::find($id);
        } else {
            $observations = \DB::table('observations')
                ->join('birds', 'birds.id', '=', 'observations.bird_id')
                ->join('locations', 'locations.id', '=', 'observations.location_id')
                ->join('persons', 'persons.id', '=', 'observations.person_id')
                ->when($birdname, function ($birdquery) use ($birdname) {
                    return $birdquery->where('BirdName', $birdname);
                })
                ->when($species, function ($speciesquery) use ($species) {
                    return $speciesquery->where('Species', $species);
                })
                ->when($locationname, function ($locationquery) use ($locationname) {
                    return $locationquery->where('LocationName', $locationname);
                })
                ->when($lat, function ($latquery) use ($lat) {
                    return $latquery->where('Lat', $lat);
                })
                ->when($lng, function ($lngquery) use ($lng) {
                    return $lngquery->where('LocationName', $lng);
                })
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
        }

        return \Response::json([
            'error' => false,
            'observations' => $observations,
            'status_code' => 200,
            'request' => $request
        ]);
    }
}
