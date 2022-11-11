<?php

namespace Database\Seeders;

use App\Models\Distict;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DistictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ups = [
            'Dhaka',
            'Faridpur',
            'Gazipur',
            'Gopalganj',
            'Jamalpur',
        ];

        foreach ($ups as $upzilla) {
            Distict::create([
                'name' => $upzilla,
                'distict_id' => 1
            ]);
        }
    }
}
