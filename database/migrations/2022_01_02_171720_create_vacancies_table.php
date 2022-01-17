<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancies', function (Blueprint $table) {
            // title,  age range, tribe, experience, qualification
            // status , description
            $table->id();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->integer('experience')->nullable();
            $table->string('qualification')->nullable();
            $table->boolean('status')->default(false);
            $table->integer('from_age')->nullable();
            $table->integer('to_age')->nullable();
            $table->integer('is_admin')->nullable();
            $table->integer('is_employer')->nullable();
            $table->integer('uploader_id')->nullable();
            $table->integer('employer_id')->nullable();
            $table->string('tribe')->nullable();
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
        Schema::dropIfExists('vacancies');
    }
}
