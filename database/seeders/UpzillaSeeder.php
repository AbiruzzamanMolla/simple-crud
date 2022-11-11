<?php

namespace Database\Seeders;

use App\Models\Distict;
use App\Models\Upzilla;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UpzillaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ups = [
            'Shibpur',
            'Narshingdi Sadar',
            'Belabo',
            'Raipura',
            'Jamalpur',
        ];

        foreach ($ups as $upzilla) {
            Upzilla::create([
                'name' => $upzilla,
                'distict_id' => 1
            ]);
        }
    }
}
