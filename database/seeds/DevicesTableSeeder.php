<?php

use Illuminate\Database\Seeder;

class DevicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert('INSERT INTO devices (devicename,serial,role,devicestatus,info)VALUES("2020-S82263a","DMPD62Q9MDFV1","児童","貸出中","テスート")');
        DB::insert('INSERT INTO devices (devicename,serial,role,devicestatus,info)VALUES("2020-S82263b","DMPD62Q9MDFV2","児童","予備","テスート")');
        DB::insert('INSERT INTO devices (devicename,serial,role,devicestatus,info)VALUES("2020-S82263c","DMPD62Q9MDFV3","先生","予備","テスート")');

        //
    }
}
