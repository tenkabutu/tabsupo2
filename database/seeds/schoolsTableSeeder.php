<?php

use Illuminate\Database\Seeder;

class schoolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert('INSERT INTO schools (schoolid,schoolname,jititai,index50,tel,koutyou,kyoutou1,schoolcategory)VALUES(1,"熊本市弓削小学校","熊本市",9,098-339-5878, "加藤武則","宮崎駿",1)');
        DB::insert('INSERT INTO schools (schoolid,schoolname,jititai,index50,tel,koutyou,kyoutou1,schoolcategory)VALUES(2,"武蔵中学校", "那珂川",10,098-339-5878, "加藤武則","宮崎駿",2)');
        DB::insert('INSERT INTO schools (schoolid,schoolname,jititai,index50,tel,koutyou,kyoutou1,schoolcategory)VALUES(3,"楠中学校", "大船越",10,098-339-5878, "加藤武則","宮崎駿",2)');

    }
}