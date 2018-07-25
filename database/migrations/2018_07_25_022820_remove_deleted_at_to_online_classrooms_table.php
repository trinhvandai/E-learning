<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveDeletedAtToOnlineClassroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('online_classrooms', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });

        Schema::table('online_classrooms', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('online_classrooms', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });

        Schema::table('online_classrooms', function (Blueprint $table) {
            $table->string('deleted_at')->nullable();
        });
    }
}
