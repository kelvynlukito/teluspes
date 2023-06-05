<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gedung;

class GedungController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gedungs = Gedung::all();
        return view('app.gedung.index', compact('gedungs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.gedung.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //create data to database
        $request->validate([
            'nama_gedung' => 'required',
        ]);

        //create data to database
        Gedung::create([
            'nama_gedung' => $request->nama_gedung,
            'status_gedung' => 0,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('gedung.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $gedung = Gedung::find($id);
        return view('app.gedung.edit', compact('gedung'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {


        $gedung = Gedung::find($id);
        $gedung->nama_gedung = $request->nama_gedung;
        $gedung->alamat = $request->alamat;
        $gedung->save();

        return redirect()->route('gedung.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gedung = Gedung::find($id);
        $gedung->delete();
        return redirect()->route('gedung.index');
    }
}
