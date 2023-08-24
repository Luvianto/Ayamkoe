<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i=0;$i<15;$i++){
            $input = ['admin','karyawan','user'];
            $rand_keys = array_rand($input);
            $data[$i] = [
               'name' => $faker->name,
               'alamat' => 'hoho',
               'noTelp' => '0123456789',
               'email' => $faker->unique()->safeEmail,
               'password' => bcrypt('password'),
               'remember_token' => Str::random(10),
               'role' => $input[$rand_keys],
            ];
        }

        DB::table('users')->insert($data);
    }
}
