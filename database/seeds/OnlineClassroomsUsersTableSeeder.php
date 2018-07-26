<?php

use Illuminate\Database\Seeder;

class OnlineClassroomsUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('online_classrooms_users')->truncate();
        Schema::enableForeignKeyConstraints();
        
        factory(App\Models\OnlineClassroomsUser::class, 10)->create();
    }
}
