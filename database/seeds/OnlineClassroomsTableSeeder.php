<?php

use Illuminate\Database\Seeder;

class OnlineClassroomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('online_classrooms')->truncate();
        Schema::enableForeignKeyConstraints();
        
        factory(App\Models\OnlineClassroom::class, 10)->create();
    }
}
