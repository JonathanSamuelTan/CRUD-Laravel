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
        $pict = $request->name .".". $request->file('picture')->getClientOriginalExtension();
        // save to public/storage/img
        $request->file('picture')->storeAs('public/img', $pict);
        DriverModel::Create([
           'name' => $request->name,
           'team' => $request->team,
            'picture' => $pict           
        ]);
        return redirect()->route('welcome');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $driver = DriverModel::find($id);

        // check if user upload new picture
        $pict = "";
        if($request->hasFile('picture')){
            $pict = $request->name .".". $request->file('picture')->getClientOriginalExtension();
            // save to public/storage/img
            $request->file('picture')->storeAs('public/img', $pict);
        }else{
            $pict = $driver->picture;
        }
        $driver->name = $request->name;
        $driver->team = $request->team;
        $driver->picture = $pict;
        $driver->save();
        return redirect()->route('welcome');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $driver = DriverModel::find($id);
        // delete picture
        unlink(storage_path('app/public/img/'.$driver->picture));
        $driver->delete();
        return redirect()->route('welcome');
    }
}
