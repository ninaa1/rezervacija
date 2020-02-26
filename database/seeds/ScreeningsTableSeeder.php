<?php

use App\Screening;
use Illuminate\Database\Seeder;

class ScreeningsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $movie_ids = [1,1,1,1,2,2,2,2,3,3,3,3,4,4,4,4];
        $hall_ids = [1,2,3,4,1,2,3,4,1,2,3,4,1,2,3,4];
        $prices = [20,13,51,72,14,14,61,12,15,14,77,14,61,71,13,41];
        $starts = [
            "2020-02-25 19:33:21","2020-02-25 19:33:21","2020-02-25 19:33:21","2020-02-25 19:33:21",
            "2020-02-26 19:33:21","2020-02-26 19:33:21","2020-02-26 19:33:21","2020-02-26 19:33:21",
            "2020-02-27 19:33:21","2020-02-27 19:33:21","2020-02-27 19:33:21","2020-02-27 19:33:21",
            "2020-02-28 19:33:21","2020-02-28 19:33:21","2020-02-28 19:33:21","2020-02-28 19:33:21",
        ];
        $ends = [
            "2020-02-25 21:33:21","2020-02-25 21:33:21","2020-02-25 21:33:21","2020-02-25 21:33:21",
            "2020-02-26 21:33:21","2020-02-26 21:33:21","2020-02-26 21:33:21","2020-02-26 21:33:21",
            "2020-02-27 21:33:21","2020-02-27 21:33:21","2020-02-27 21:33:21","2020-02-27 21:33:21",
            "2020-02-28 21:33:21","2020-02-28 21:33:21","2020-02-28 21:33:21","2020-02-28 21:33:21",
        ];

        for ($i=0; $i < count($movie_ids); $i++) { 
            Screening::create([
                'movie_id' => $movie_ids[$i], 
                'hall_id' => $hall_ids[$i], 
                'price' => $prices[$i], 
                'start' => $starts[$i],
                'end' => $ends[$i]
            ]);
        }
    }
}