<?php

use Illuminate\Database\Seeder;

class SpecializesUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('specializes_users')->truncate();
        Schema::enableForeignKeyConstraints();
        
        factory(App\Models\SpecializesUser::class, 10)->create();
    }
}
