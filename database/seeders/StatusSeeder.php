<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    public function run(): void
    {
        Status::create(['name' => 'На рассмотрении']);
        Status::create(['name' => 'Дата назначена']);
        Status::create(['name' => 'Выполнено']);
    }
}
