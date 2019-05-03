<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectCodeFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_code_files', function (Blueprint $table) {
            $table->increments('id');
           $table->integer('project_code_id')->unsigned();
           $table->foreign('project_code_id')->references('id')->on('projects')->onDelete('cascade');;
            $table->string('filename')->nullable();
            $table->string('originalFileNames')->nullable();

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
        Schema::dropIfExists('project_code_files');
    }
}
