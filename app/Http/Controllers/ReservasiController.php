<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;
use App\Models\ruangan;

class ReservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservasis = Reservasi::with('ruangan')->get();
        return view('app.reservasi.index', compact('reservasis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //create data to database
        $request->validate([
            'nim' => 'required',
            'id_ruangan' => 'required',
            'tanggal' => 'required|date',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'keperluan' => 'nullable',
            'status' => 'required',
            
        ]);

        //create data to database
        Gedung::create([
            'nim' => $request->nim,
            'id_ruangan' => $request->id_ruangan,
            'tanggal' => $request->tanggal,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'keperluan' => $request->keperluan,
            'status' => $request->status,
        ]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateStatus(Request $request, string $id)
    {
        $reservasi = Reservasi::find($id);
        $reservasi->status = $request->status;
        if ($request->status == 'Disetujui') {
            $ruangan = ruangan::find($reservasi->id_ruangan);
            $ruangan->status_ruangan = 1;
        } else if ($request->status == 'Ditolak') {
            $ruangan = ruangan::find($reservasi->id_ruangan);
            $ruangan->status_ruangan = 0;
        } else {
            $ruangan = ruangan::find($reservasi->id_ruangan);
            $ruangan->status_ruangan = 0;
        }
        $reservasi->update();
        $ruangan->update();

        return redirect()->route('app.reservasi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
