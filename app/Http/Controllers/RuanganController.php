<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ruangan;
use App\Models\Gedung;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ruangans = ruangan::with('gedung')->get();
        return view('app.ruangan.index', compact('ruangans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //get with all data gedung
        $gedungs = Gedung::all();
        return view('app.ruangan.create', compact('gedungs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //create data to database
        $request->validate([
            'nomor_ruangan' => 'required',
        ]);

        //create data to database
        ruangan::create([
            'nomor_ruangan' => $request->nomor_ruangan,
            'id_gedung' => $request->id_gedung,
            'status_ruangan' => 0,

        ]);


        return redirect()->route('ruangan.index');
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
        //get with relasi to gedung
        $ruangan = ruangan::with('gedung')->find($id);
        $gedungs = Gedung::all();
        return view('app.ruangan.edit', compact('ruangan', 'gedungs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {


        $ruangan = ruangan::find($id);
        $ruangan->nomor_ruangan = $request->nomor_ruangan;
        $ruangan->id_gedung = $request->id_gedung;

        $ruangan->update();
        return redirect()->route('app.ruangan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ruangan = ruangan::find($id);
        $ruangan->delete();
        return redirect()->back();
    }
}
