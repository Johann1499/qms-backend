<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QueueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('queues')->insert([
            'name' => 'Johann Hernandez',
            'student_number' => '200444621',
            'department' => 'Basic Education',
            'queue_number' => 'C0001'
        ]);
    }
}
