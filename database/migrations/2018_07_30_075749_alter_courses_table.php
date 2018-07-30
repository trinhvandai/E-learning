<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->string('course_avatar_2')->after('course_avatar');
            $table->string('course_avatar_3')->after('course_avatar_2');
            $table->unsignedInteger('lecture_count')->after('description');
            $table->unsignedInteger('like')->after('lecture_count');
            $table->unsignedInteger('time')->after('lecture_count');
            $table->tinyInteger('level')->after('time');
            $table->unsignedInteger('view')->after('level');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn('course_avatar_2');
            $table->dropColumn('course_avatar_3');
            $table->dropColumn('lecture_count');
            $table->dropColumn('like');
            $table->dropColumn('time');
            $table->dropColumn('level');
            $table->dropColumn('view');
        });
    }
}
