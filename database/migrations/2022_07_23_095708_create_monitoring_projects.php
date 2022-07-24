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
            $table->date('tanggal');
            $table->date('target');
            $table->text('progress');
            $table->string('status');
            $table->date('date_selesai');
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
