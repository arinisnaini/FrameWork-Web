<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisBarangTableSeedder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
    DB::table('JenisBarang')->insert([ 
     ['nama_jenis' =>'Sembako'], 
     ['nama_jenis' =>'Kosmetik'], 
     ['nama_jenis' =>'Alat Tulis'],
     ['nama_jenis' =>'Pecah belah'],
     ['nama_jenis' =>'Makanan Ringan'],

   ]);
    }
}
