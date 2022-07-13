<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailProjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id');
            $table->foreignId('product_id');
            $table->string('estimasi_orang');
            $table->timestamp('startdate')->nullable();
            $table->timestamp('enddate')->nullable();
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
        Schema::dropIfExists('detail_projects');
    }
}
