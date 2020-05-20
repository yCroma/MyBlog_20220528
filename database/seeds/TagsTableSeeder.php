<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['Docker', 'AWS', 'Laravel', '開発環境'];
        foreach ($tags as $tag) App\Tag::create(['name' => $tag]);
    }
}
