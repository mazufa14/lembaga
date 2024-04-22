<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $userData = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' =>bcrypt(123456)
            ],
            [
                'name' => 'siswa1',
                'email' => 'siswa1@gmail.com',
                'role' => 'siswa',
                'password' =>bcrypt(123456)
            ],
            [
                'name' => 'owner',
                'email' => 'owner@gmail.com',
                'role' => 'owner',
                'password' =>bcrypt(123456)
            ],
        ];

        foreach($userData as $key => $val){
            User::Create($val);
        }
    }
}
