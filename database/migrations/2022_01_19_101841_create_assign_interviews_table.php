<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignInterviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_interviews', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('application_code')->nullable();
            $table->string('interview_code')->nullable();
            $table->integer('interview_id')->nullable();
            $table->integer('vacancy_id')->nullable();
            $table->integer('employer_id')->nullable();
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('assign_interviews');
    }
}
