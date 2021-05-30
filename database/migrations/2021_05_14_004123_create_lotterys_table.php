<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLotterysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lotterys', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('description');
            $table->integer('owner_id');
            $table->integer('ucount');
            $table->integer('wcount');
            $table->integer('reward');
            $table->boolean('type');
            $table->boolean('state');
            $table->boolean('alert')->default('0');
            $table->string('ftime');
            $table->string('mtime');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lotterys');
    }
}
