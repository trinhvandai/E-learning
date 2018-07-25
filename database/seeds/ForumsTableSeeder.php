<?php

use Illuminate\Database\Seeder;

class ForumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('forums')->truncate();
        Schema::enableForeignKeyConstraints();
        
        factory(App\Models\Forum::class, 10)->create();
    }
}
