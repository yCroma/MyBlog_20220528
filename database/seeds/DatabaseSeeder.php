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
        // $this->call(UsersTableSeeder::class);
        $this->call([
            ArticlesTableSeeder::class,
            TagsTableSeeder::class,
            Article_Tag_TableSeeder::class,
        ]);
    }
}
