<?php

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('courses')->truncate();
        Schema::enableForeignKeyConstraints();

        $files = glob(config('view.image') . '/course_avatar/*');
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }

        $files = glob(config('view.image') . '/slide_image/*');
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }
        
        factory(App\Models\Course::class, 10)->create();
    }
}
