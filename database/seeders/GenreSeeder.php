<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([
            'name' => '運動部',
            'average_evaluation' =>0,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
            
        DB::table('genres')->insert([
            'name' => '文化部',
            'average_evaluation' =>0,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]); 
        
        DB::table('genres')->insert([
            'name' => '運動系サークル',
            'average_evaluation' =>0,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]); 
            
        DB::table('genres')->insert([
            'name' => '文化系サークル',
            'average_evaluation' =>0,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);  
            
        DB::table('genres')->insert([
            'name' => 'その他',
            'average_evaluation' =>0,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]); 
    }        
}
