<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Person;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('persons')->with('persons', Person::all());
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $isprofessional = $request->input('isprofessional');

        if (!isset($isprofessional)) {
            $isprofessional = 0;
        }

        $id = \DB::table('persons')->insertGetId(['FirstName' => $request->input('firstname'),
                'LastName' => $request->input('lastname'), 'IsProfessional' => $isprofessional,
                'Street' => $request->input('street'), 'StreetNumber' => $request->input('streetnumber'),
                'ZipCode' => $request->input('zipcode'), 'City' => $request->input('city'),
                'PhoneNumber' => $request->input('phonenumber')]);
        if (isset($id)) {
            return $this->show($id);
        } else {
            return $this->index();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $observations = \DB::table('observations')
            ->join('birds', 'birds.id', '=', 'observations.bird_id')
            ->join('locations', 'locations.id', '=', 'observations.location_id')
            ->join('persons', 'persons.id', '=', 'observations.person_id')
            ->get();
        return view('person')->with(['person' => Person::find($id), 'observations' => $observations]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = \DB::table('persons')->where('id', $id)->update(['FirstName' => $request->input('firstname'),
            'LastName' => $request->input('lastname'), 'IsProfessional' => $request->input('isprofessional'),
            'Street' => $request->input('street'), 'StreetNumber' => $request->input('streetnumber'),
            'ZipCode' => $request->input('zipcode'), 'City' => $request->input('city'),
            'PhoneNumber' => $request->input('phonenumber')]);
        return $this->show($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \DB::table('persons')->where('id', $id)->destroy();
        return $this->index();
    }
}
