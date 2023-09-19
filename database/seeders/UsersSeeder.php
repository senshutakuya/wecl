<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
DB::table('users')->insert([
		        'name' => 'test',
                'email' => 'test@example.com',
                'password' => 'aaa',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);

        //
    }
}
