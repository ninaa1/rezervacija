<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(HallsTableSeeder::class);
        $this->call(MoviesTableSeeder::class);
        $this->call(ScreeningsTableSeeder::class);
        $this->call(SeatsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
    }
}
