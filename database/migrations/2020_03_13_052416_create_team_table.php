<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('position')->nullable();
            $table->longText('short_description')->nullable();
            $table->boolean('is_active')->nullable()->default(0);
            $table->string('image')->nullable();
            $table->string('slug')->nullable();
            $table->string('display_orders')->nullable();
            $table->string('facebook')->nullable();
            $table->string('email')->nullable();
            $table->string('twitter')->nullable();
            $table->string('insta')->nullable();
            $table->integer('created_by')->unsigned();
            $table->softDeletes();
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
        Schema::dropIfExists('team');
    }
}
