<?php

use Illuminate\Database\Seeder;

class Article_Tag_TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $articles = App\Article::all();
        $data1 = [2, 3];
        $data2 = [1, 3, 4];
        $data3 = [1, 2];
        $data4 = [1, 2, 3];

        foreach ($articles as $article){
            $rand = mt_rand() % 5;
            switch ($rand) {
                case 0:
                    $tag_id = mt_rand(1, 4);
                    $article->tags()->attach($tag_id);
                break;
                case 1:
                    $article->tags()->attach($data1);
                break;
                case 2:
                    $article->tags()->attach($data2);
                break;
                case 3:
                    $article->tags()->attach($data3);
                break;
                case 4:
                    $article->tags()->attach($data4);
                break;
            }
        }
    }
}
