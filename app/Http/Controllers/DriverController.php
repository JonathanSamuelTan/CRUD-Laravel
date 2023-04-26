<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DriverModel;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drivers = DriverModel::all();
        return view('welcome', compact('drivers'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       DriverModel::Create([
           'name' => $request->name,
           'team' => $request->team
       ]);
       return redirect()->route('welcome');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $driver = DriverModel::find($id);
        $driver->name = $request->name;
        $driver->team = $request->team;
        $driver->save();
        return redirect()->route('welcome');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $driver = DriverModel::find($id);
        $driver->delete();
        return redirect()->route('welcome');
    }
}
