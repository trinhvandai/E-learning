<?php

use Illuminate\Database\Seeder;

class TestElementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('test_elements')->truncate();
        Schema::enableForeignKeyConstraints();
        
        factory(App\Models\TestElement::class, 10)->create();
    }
}
