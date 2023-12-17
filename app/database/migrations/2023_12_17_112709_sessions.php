<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->increments("id");
            $table->string("identifier");
            $table->integer("score");
            $table->unsignedInteger("course_id");
            $table->foreign('course_id')
                ->references('id')
                ->on('courses');
            $table->unsignedInteger("user_id");
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->unsignedInteger("exercise_id");
            $table->foreign('exercise_id')
                ->references('id')
                ->on('exercises');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sessions');
    }
};
