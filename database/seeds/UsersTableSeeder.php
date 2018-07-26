<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('users')->truncate();
        Schema::enableForeignKeyConstraints();

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
            'address' => 'Ha Noi',
            'role' => '0',
        ]);

        $files = glob(config('view.image') . '/avatar/*');
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }
        
        factory(App\Models\User::class, 10)->create();
    }
}
