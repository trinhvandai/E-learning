<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(SpecializesTableSeeder::class);
        $this->call(SpecializesUsersTableSeeder::class);
        $this->call(OnlineClassroomsTableSeeder::class);
        $this->call(OnlineClassroomsUsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(CoursesTableSeeder::class);
        $this->call(CoursesUsersTableSeeder::class);
        $this->call(TestsTableSeeder::class);
        $this->call(TestElementsTableSeeder::class);
        $this->call(ForumsTableSeeder::class);
        $this->call(TopicsTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(ProvincesTableSeeder::class);
        $this->call(DistrictsTableSeeder::class);
        $this->call(CommunesTableSeeder::class);
    }
}
