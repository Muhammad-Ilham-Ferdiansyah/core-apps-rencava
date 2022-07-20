<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailTeams extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_teams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('detail_project_id');
            $table->foreignId('user_id');
            $table->text('jobdesc');
            $table->date('startdate')->nullable();
            $table->date('enddate')->nullable();
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
        Schema::dropIfExists('detail_teams');
    }
}
