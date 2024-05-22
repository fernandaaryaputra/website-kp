<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $user = [
            [
                'username'=>'admin',
                'name'=>'AkunAdmin',
                'email'=>'admin@gmail.com',
                'level'=>'admin',
                'password'=>Hash::make('123456')
            ],
            [
                'username'=>'administrator',
                'name'=>'administrator',
                'email'=>'administrator@gmail.com',
                'level'=>'administrator',
                'password'=>Hash::make('654321')
            ],
            [
                'username'=>'fasyangkes',
                'name'=>'fasyangkes',
                'email'=>'fasyangkes@gmail.com',
                'level'=>'fasyangkes',
                'password'=>Hash::make('12345')
            ],
            [
                'username'=>'dinsos',
                'name'=>'dinsos',
                'email'=>'dinsos@gmail.com',
                'level'=>'dinsos',
                'password'=>Hash::make('12345')
            ],
            [
                'username'=>'user1',
                'name'=>'AkunUser1',
                'email'=>'user1@gmail.com',
                'level'=>'user',
                'password'=>Hash::make('123456')
            ],
            [
                'username'=>'user2',
                'name'=>'AkunUser2',
                'email'=>'user2@gmail.com',
                'level'=>'user',
                'password'=>Hash::make('123456')
            ],

        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
