<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    public function show($article_id)
    {
        // 記事のIDからレコードを取得
        $article = Article::find($article_id);
        // レコードからファイルを取得
        $draft = Storage::disk('s3')->get($article->draft);
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
