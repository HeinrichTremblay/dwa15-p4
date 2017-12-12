<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlueprintTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blueprint_tag', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('blueprint_id')->unsigned();
            $table->integer('tag_id')->unsigned();
            $table->foreign('blueprint_id')->references('id')->on('blueprints')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blueprint_tag');
    }
}
