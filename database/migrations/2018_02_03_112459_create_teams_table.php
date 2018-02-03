<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Team', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('id_planning');
            $table->string('logo_url');
            $table->integer('elo');
            $table->integer('rank_tier');
            $table->string('disp_days');
            $table->string('disp_hours');
            $table->string('description');
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
        Schema::dropIfExists('Team');
    }
}
