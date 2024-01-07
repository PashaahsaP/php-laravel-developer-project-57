<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('task_statuses')->insert([
            ['name' => 'новый','created_at'=>'2024-01-07 00:00:00'],
            ['name' => 'в работе','created_at'=>'2024-01-07 00:00:00'],
            ['name' => 'на тестировании','created_at'=>'2024-01-07 00:00:00'],
            ['name' => 'завершен','created_at'=>'2024-01-07 00:00:00'],
        ]);
    }
}
