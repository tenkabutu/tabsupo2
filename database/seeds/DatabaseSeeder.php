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
        $this->call(schoolsTableSeeder::class);
        $this->call(TeachersTableSeeder::class);
        $this->call(DevicesTableSeeder::class);
        $this->call(usersTableSeeder::class);
    }
}
