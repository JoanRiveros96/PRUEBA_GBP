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
        
            // DB::table('inventarios')->insert([
            //     'id_bodega' => '3',
            //     'id_producto' => '9',
                
            // ]);
            // DB::table('inventarios')->insert([
            //     'id_bodega' => '2',
            //     'id_producto' => '10',
                
            // ]);
            // DB::table('inventarios')->insert([
            //     'id_bodega' => '1',
            //     'id_producto' => '6',
                
            // ]);
            DB::table('inventarios')->insert([
                'id_bodega' => '4',
                'id_producto' => '9',
                
            ]);
            
           
        
    }
}
