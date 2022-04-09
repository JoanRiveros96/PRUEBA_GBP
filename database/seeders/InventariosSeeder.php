<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class InventariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
            DB::table('inventarios')->insert([
                'id_bodega' => '1',
                'id_producto' => '1',
                
            ]);
            DB::table('inventarios')->insert([
                'id_bodega' => '1',
                'id_producto' => '2',
                
            ]);
            DB::table('inventarios')->insert([
                'id_bodega' => '3',
                'id_producto' => '5',
                
            ]);
            DB::table('inventarios')->insert([
                'id_bodega' => '5',
                'id_producto' => '8',
                
            ]);
            DB::table('inventarios')->insert([
                'id_bodega' => '8',
                'id_producto' => '2',
                
            ]);
        
    }
}
