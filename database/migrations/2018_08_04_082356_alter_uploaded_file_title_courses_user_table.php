<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUploadedFileTitleCoursesUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courses_users', function (Blueprint $table) {
            $table->renameColumn('uploaded_file_name', 'uploaded_file_title');
            $table->time('uploaded_file_time')->nullable()->after('uploaded_file_link');
            $table->tinyInteger('uploaded_file_active')->after('uploaded_file_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses_users', function (Blueprint $table) {
            $table->renameColumn('uploaded_file_title', 'uploaded_file_name');
            $table->dropColumn('uploaded_file_time');
            $table->dropColumn('uploaded_file_active');
        });
    }
}
