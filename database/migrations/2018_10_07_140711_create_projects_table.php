<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('Δέν υπάρχει όνομα');
            $table->string('description')->default('Δέν υπάρχει περιγραφή');
            $table->string('cover_image')->default('cover_image_default.jpg');
            $table->string('difficulty')->default('Δέν υπάρχει βαθμός δυσκολίας');
            $table->string('code_title')->nullable();
            $table->string('code_description')->nullable();
            $table->longText('about')->nullable();
           $table->boolean('is_publish')->default(false);
            $table->boolean('permission')->default(false);
            $table->integer('user_id');
            
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
        Schema::dropIfExists('projects');
    }
}
