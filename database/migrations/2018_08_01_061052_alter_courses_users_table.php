<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCoursesUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courses_users', function (Blueprint $table) {
            $table->boolean('active')->nullable()->after('id');
            $table->string('uploaded_file_name')->nullable()->change();
            $table->string('uploaded_file_description')->nullable()->change();
            $table->string('uploaded_file_link')->nullable()->change();
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
            $table->dropColumn('active');
            $table->string('uploaded_file_name')->change();
            $table->string('uploaded_file_description')->change();
            $table->string('uploaded_file_link')->change();
        });
    }
}
