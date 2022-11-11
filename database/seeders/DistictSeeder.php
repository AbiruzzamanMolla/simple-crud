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
        $disticts = [
            'Barishal',
        ];

        foreach ($disticts as $distict) {
            Distict::create([
                'name' => $distict,
                'division_id' => 1
            ]);
        }
    }
}
