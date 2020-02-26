<?php

use App\Hall;
use Illuminate\Database\Seeder;

class HallsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $halls = ['Dvorana1', 'Dvorana2', 'Dvorana3', 'Dvorana4'];

        foreach ($halls as $hall) {
            Hall::create(['name' => $hall, 'seats_number' => 100]);
        }
    }
}
