<?php

use Illuminate\Database\Seeder;

class CoursesUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('courses_users')->truncate();
        Schema::enableForeignKeyConstraints();
        
        $files = glob(config('view.image') . '/uploaded_file_link/*');
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }

        factory(App\Models\CoursesUser::class, 10)->create();
    }
}
