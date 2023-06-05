<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reservasis')->insert([
            'nim' => '201910370311123',
            'id_ruangan' => '1',
            'tanggal' => '2021-04-06',
            'jam_mulai' => '08:00',
            'jam_selesai' => '09:00',
            'keperluan' => 'Kuliah',
            'status' => 'Disetujui',
        ]);
    }
}
