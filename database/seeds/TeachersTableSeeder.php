<?php

use Illuminate\Database\Seeder;

class TeachersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert('INSERT INTO teachers (schoolid,teachername,role,info)VALUES(1,"加藤武則","1","タブサポエース")');
        DB::insert('INSERT INTO teachers (schoolid,teachername,role,info)VALUES(2,"松浦あやこ", "3","やるときはやる")');
        DB::insert('INSERT INTO teachers (schoolid,teachername,role,info)VALUES(2,"中村", "2","期待の新人")');


    }
}
