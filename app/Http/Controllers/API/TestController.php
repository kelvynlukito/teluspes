<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Gedung;
use App\Models\ruangan;
use App\Models\User;

class TestController extends Controller
{
    public function indexGedung()
    {
        $gedungs = Gedung::all();
        return response()->json([
            'success' => true,
            'message' => 'Daftar data gedung',
            'data' => $gedungs
        ], 200);
    }

    public function indexRuangan()
    {
        $ruangans = Ruangan::all();
        return response()->json([
            'success' => true,
            'message' => 'Daftar data ruangan',
            'data' => $ruangans
        ], 200);
    }

    public function indexUser()
    {
        $user = User::all();
        return response()->json([
            'success' => true,
            'message' => 'Daftar data user',
            'data' => $user
        ], 200);
    }

    public function storeGedung(Request $request)
    {
        try {

            $request->validate([
                'nama_gedung' => 'required',
                'status_gedung' => 'required',
                'alamat' => 'required',
            ]);

            $gedung = Gedung::create([
                'nama_gedung' => $request->nama_gedung,
                'status_gedung' => $request->status_gedung,
                'alamat' =>  $request->alamat,

            ]);


            return response()->json([
                'success' => true,
                'message' => 'Daftar data gedung',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => true,
                'message' => 'Daftar data gedung',
            ], 500);
        }
    }

    public function storeRuangan(Request $request)
    {
        try {

            $request->validate([
                'nomor_ruangan' => 'required',
                'status_ruangan' => 'required',
                'id_gedung' => 'required',
            ]);

            $gedung = Ruangan::create([
                'nomor_ruangan' => $request->nomor_ruangan,
                'status_ruangan' => $request->status_ruangan,
                'id_gedung' => $request->id_gedung,
            ]);


            return response()->json([
                'success' => true,
                'message' => 'Daftar data ruangan',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => true,
                'message' => 'Daftar data ruangan',
            ], 500);
        }
    }

    public function storeUser(Request $request)
    {
        try {

            $request->validate([
                'name' => 'required',
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'nim' => 'required',
            ]);

            $gedung = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'role' => 'mahasiswa',
                'nim' => $request->nim,
                'password' => Hash::make('password'),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Daftar data user',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => true,
                'message' => 'Daftar data user',
            ], 500);
        }
    }
}
