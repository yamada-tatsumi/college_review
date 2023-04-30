<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
            'name' => 'Yamada Tatsumi',
            'email' =>'tatsumi1201.asdf@icloud.com',
            'password' =>Hash::make('tatsumi1201'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
    }
}
