<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Bird;
use App\Location;
use App\Person;
use App\Observation;

class ObservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $observations = \DB::table('observations')
            ->join('birds', 'birds.id', '=', 'observations.bird_id')
            ->join('locations', 'locations.id', '=', 'observations.location_id')
            ->join('persons', 'persons.id', '=', 'observations.person_id')
            ->get();
        $birds = Bird::pluck('BirdName', 'Id');
        $locations = Location::pluck('LocationName', 'Id');
        $persons = Person::pluck('LastName', 'Id');
        return view('observations')->with(['observations' => $observations, 'birds' => $birds,
            'locations' => $locations, 'persons' => $persons]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = \DB::table('observations')->insertGetId(['Bird_id' => $request->input('bird_id'),
            'Location_id' => $request->input('location_id'), 'Person_id' => $request->input('person_id')]);
        return $this->index($id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return \Redirect::route('observations.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
