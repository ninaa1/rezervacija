<?php

use App\Seat;
use Illuminate\Database\Seeder;

class SeatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rows = [
            1 => [1,2,3,4,5,6,7,8,9,10,11,12],
            2 => [1,2,3,4,5,6,7,8,9,10,11,12],
            3 => [1,2,3,4,5,6,7,8,9,10,11,12],
            4 => [1,2,3,4,5,6,7,8,9,10,11,12],
            5 => [1,2,3,4,5,6,7,8,9,10,11,12],
            6 => [1,2,3,4,5,6,7,8,9,10,11,12],
            7 => [1,2,3,4,5,6,7,8,9,10,11,12],
            8 => [1,2,3,4,5,6,7,8,9,10,11,12],
            9 => [1,2,3,4,5,6,7,8,9,10,11,12],
            10 => [1,2,3,4,5,6,7,8,9,10,11,12],
            11=> [1,2,3,4,5,6,7,8,9,10,11,12],
            12 => [1,2,3,4,5,6,7,8,9,10,11,12]
        ];
        $halls = [1,2,3,4];
        foreach($halls as $hall) {
            foreach($rows as $row => $seats) {
                foreach($seats as $seat) {
                    Seat::create([
                        'row' => $row, 
                        'number' => $seat, 
                        'hall_id' => $hall
                    ]);
                }
            }
        }
    }
}
