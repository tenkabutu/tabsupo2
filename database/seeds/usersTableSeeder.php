<?php

use Illuminate\Database\Seeder;

class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert('INSERT INTO users (name,email,password)VALUES("遠藤","tenkabutu100@gmail.com","12345678")');

    }
}
