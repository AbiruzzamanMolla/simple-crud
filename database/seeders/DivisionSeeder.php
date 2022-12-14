<?php

namespace Database\Seeders;

use App\Models\Division;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $divisions = ['Barishal Division', 'Chattogram Division', 'Dhaka Division', 'Khulna Division', 'Mymensingh Division', 'Rajshahi Division', 'Rangpur Division', 'Sylhet Division'];

        foreach ($divisions as $division) {
            Division::create([
                'name' => $division
            ]);
        }
    }
}
