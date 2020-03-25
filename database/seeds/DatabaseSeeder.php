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
        factory(\App\User::class)->times(10)->create();
        factory(\App\Model\Post::class)->times(5)->create();
        factory(\App\Model\Comment::class)->times(3)->create();
        // $this->call(UsersTableSeeder::class);
    }
}
