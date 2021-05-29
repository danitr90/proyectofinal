<?php

namespace App\Http\Controllers;

use App\Models\Races;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class RacesController extends Controller
{

    public function index(Request $request)
    {

        $races = Races::ReturnAll();

        $admin = $this->isAdmin();



        return view('carreras', compact('races', 'admin'));
    }

    public function create()
    {

        $admin = $this->isAdmin();

        if ($admin == true) {
            return view('nova_carrera');
        } else {
            abort(403);
        }
    }

    public function store(Request $request)
    {

        $race = new Races();

        $request->validate([
            'name' => 'required',
            'descripcion' => 'required',
            'distance'  => 'required|numeric',
            'time_start'  => 'required|date',
            "file" => 'required',
        ]);

        $codigo = Races::GetMaxId();
        $id = $codigo->id + 1;

        $race->code = $id;
        $race->name = $request->name;
        $race->descripcion = $request->descripcion;
        $race->distance  = $request->distance;
        $race->time_start  = $request->time_start;
        $race->image = $request->file('file')->store('public');

        $race->save();
        return redirect()->route("carreras.show", $race);
    }

    public function show($id)
    {

        $race = Races::ReturnRace($id);


        $admin = $this->isAdmin();

        if ($admin == true) {

            $segments = explode('T', $race->time_start);
            return view('show_races', compact('race', 'admin', 'segments'));
        } else {
            abort(403);
        }
    }

    public function edit($id)
    {

        $admin = $this->isAdmin();

        if ($admin == true) {

            $race = Races::ReturnRace($id);
            return view('edit_race', compact('race'));
        } else {
            abort(403);
        }
    }

    public function update(Request $request, $id)
    {
<<<<<<< HEAD

        $request->validate([
            'name' => 'required',
            'descripcion' => 'required',
            'distance'  => 'required|numeric',
            'time_start'  => 'required|date',
            "file" => 'required',
        ]);
=======
        //dd($request->all());
>>>>>>> 3144596a0aa2f4b63b7109674e2d5064475434a0

        $race = Races::find($id);

        $race->name = $request->name;
        $race->descripcion = $request->descripcion;
        $race->distance  = $request->distance;
        $race->time_start  = $request->time_start;
        $race->image = $request->file('file')->store('public');

        $race->save();
        return redirect("/carreras");
    }

    public function destroy($id)
    {

        $new = Races::ReturnRace($id);
        $new->delete();
        return redirect('/carreras');
    }
}
