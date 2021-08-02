<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('schoolid');
            $table->string('schoolname');
            $table->string('jititai');
            $table->integer('index50');
            $table->string('tel');
            $table->string('koutyou');
            $table->string('kyoutou1');
            $table->string('kyoutou2')->nullable();
            $table->string('tantou')->nullable();
            $table->integer('schoolcategory')->default(0);;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schools');
    }
}
