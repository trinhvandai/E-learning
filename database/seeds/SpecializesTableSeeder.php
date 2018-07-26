<?php

use Illuminate\Database\Seeder;

class SpecializesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('specializes')->truncate();
        Schema::enableForeignKeyConstraints();
        
        factory(App\Models\Specialize::class, 10)->create();
    }
}
