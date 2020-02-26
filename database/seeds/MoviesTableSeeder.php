<?php

use App\Movie;
use Illuminate\Database\Seeder;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $titles = ['Spiderman', 'Parazit', 'Hobit', 'Gladiator'];
        $directors = ["guy1", "guy2", "guy3", "guy4"];
        $descriptions = ["nice movie", "nice movie", "nice movie", "nice movie"];
        $durations = [119,120,150,150];

        for ($i=0; $i < count($titles); $i++) { 
            Movie::create([
                'title' => $titles[$i], 
                'director' => $directors[$i], 
                'description' => $descriptions[$i], 
                'duration' => $durations[$i]
            ]);
        }
    }
}
