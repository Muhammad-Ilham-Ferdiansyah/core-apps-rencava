<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonitoringProjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monitoring_projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('detail_project_id');
            $table->date('date_progress');
            $table->date('target');
            $table->text('desc_progress');
            $table->string('progress');
            $table->string('evidence');
            $table->string('revision')->nullable();
            $table->string('status')->nullable();
            $table->date('date_selesai')->nullable();
            $table->string('evaluasi')->nullable();
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
        Schema::dropIfExists('monitoring_projects');
    }
}
