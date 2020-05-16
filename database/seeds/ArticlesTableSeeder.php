<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        @for ($i = 1; $i < 11; $i++)
            # 10件のダミーデータを作成する
            $title = "{{ $i }}件目の投稿";
            $draft = "{{ $i }}番目の記事です。";
            App\Article::create(['title' => $title, 'draft' => $draft]);
        @endfor
    }
}
