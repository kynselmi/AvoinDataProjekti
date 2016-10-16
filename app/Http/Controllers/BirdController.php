<?php

namespace App\Http\Controllers;

use App\Bird;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BirdController extends Controller
{

    public function show($id)
    {
        return view('bird')->with('bird', Bird::find($id));
    }

    public function index()
    {
        return view('birds')->with('birds', Bird::all());
    }

    public function store(Request $request)
    {
        $id = \DB::table('birds')
            ->insertGetId(['BirdName' => $request->input('birdname'), 'Species' => $request->input('species')]);
        if (isset($id)) {
            return redirect('birds/'.$id)->with([
                'flash_message' => 'Bird '.$request->input('birdname').' was created!',
            ]);
        } else {
            return redirect('birds.index')->with([
                'flash_message' => 'Could not create bird!',
                'flash_message_important' => true
            ]);
        };
    }

    public function update($id, Request $request)
        {
            \DB::table('birds')->where('id', $id)->update(['BirdName' => $request->input('birdname'), 'Species' => $request->input('species')]);
            return $this->show($id);
        }

    public function destroy($id) {
        \DB::table('birds')->where('id', $id)->delete();
        return \Redirect::route('birds.index');
    }
}