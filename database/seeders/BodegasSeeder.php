<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class BodegasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 5 ; $i++) { 
            DB::table('bodegas')->insert([
                'nombre' => Str::random(30),
                'id_responsable' => '1',
                
            ]);
        }
        for ($i=0; $i < 5 ; $i++) { 
            DB::table('bodegas')->insert([
                'nombre' => Str::random(30),
                'id_responsable' => '3',
                
            ]);
        }for ($i=0; $i < 5 ; $i++) { 
            DB::table('bodegas')->insert([
                'nombre' => Str::random(30),
                'id_responsable' => '5',
                
            ]);
        }for ($i=0; $i < 5 ; $i++) { 
            DB::table('bodegas')->insert([
                'nombre' => Str::random(30),
                'id_responsable' => '7',
                
            ]);
        }
    }
}
