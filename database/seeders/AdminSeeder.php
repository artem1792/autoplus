<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Артём',
            'middlename' => 'Александрович',
            'lastname' => 'Бобровский',
            'tel' => '+7(999)999-99-99',
            'login' => 'admin',
            'email' => 'artem@mail.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);
    }
}
