<?php

use Illuminate\Database\Seeder;

class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('topics')->truncate();
        Schema::enableForeignKeyConstraints();

        $files = glob(config('view.image') . '/topic_image/*');
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }
        
        factory(App\Models\Topic::class, 10)->create();
    }
}
