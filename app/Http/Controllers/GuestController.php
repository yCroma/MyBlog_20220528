<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Article;
use App\Tag;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // ページネーション
        $articles = Article::paginate(5);
        return view('guest.index', ['articles' => $articles]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($file_name)
    {
        // ファイル名からレコードを逆検索
        $article = Article::where('draft', $file_name)->first();
        // ファイルを取得
        $draft = Storage::disk('s3')->get($file_name);
        // 記事のIDを元に、タグを取得
        $tags = $article->tags;
        // 記事のMarkdownをHTMLにパース
        $parser = new \cebe\markdown\GithubMarkdown();
        $parse_draft = $parser->parse($draft);

        return view('guest.show', [
            'article' => $article,
            'draft' => $parse_draft,
            'tags' => $tags,    
        ]);
    }

    public function tag($tag_name)
    {
        // タグ名を元にレコードを逆検索
        $tag = Tag::where('name', $tag_name)->first();
        // タグのIDを取得
        $tag_id = $tag->id;
        // タグに関係を持っている記事を取得
        $tag_articles = Tag::find($tag_id)->articles;

        return view('guest.tag',[
            'tag' => $tag,
            'tag_articles' => $tag_articles,
        ]);
    }
}
