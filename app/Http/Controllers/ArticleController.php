<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('articles.create', ['tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 記事の保存
        $draft_id = uniqid(dechex(rand()));
        $draft = $request->draft;
        Storage::put($draft_id, $draft);

        $article = Article::create([
            'title' => $request->title,
            'draft' => $draft_id,
        ]);

        // 新規記事のID取得
        $id = $article -> id;

        // タグの保存
        $article_tags = $request->tags;
        Article::find($id)->tags()->attach($article_tags);

        return redirect(route('articles.show', ['article' => $id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        // draftカラムから記事ファイルを取得
        $draft = Storage::get($article->draft);

        // 記事のIDを元に、記事に関連づけられたタグを取得
        $article_tags_obj = Article::find($article->id)->tags;

        // オブジェクトの配列となって渡されるから、必要な要素を抜き出す
        $article_tags = [];
        foreach($article_tags_obj as $tag){
            array_push($article_tags, $tag->name);
        }

        // 記事のMarkdownをHTMLにパース
        $parser = new \cebe\markdown\GithubMarkdown();
        $parse_draft = $parser->parse($draft);

        return view('articles.show', [
            'article' => $article,
            'draft' => $parse_draft,
            'article_tags' => $article_tags,    
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        // draftカラムを元に記事ファイルを取得
        $draft = Storage::get($article->draft);

        // 記事のIDを元に、記事に関連づけられたタグのオブジェクトを取得
        $article_tags_obj = Article::find($article->id)->tags;

        // オブジェクトの配列となって渡されるから、必要な要素を抜き出す
        $article_tags = [];
        foreach($article_tags_obj as $tag){
            array_push($article_tags, $tag->name);
        }

        // 登録した全てのタグの取得
        $tags = Tag::all();

        return view('articles.edit', [
            'article' => $article,
            'draft' => $draft,
            'tags' => $tags,
            'article_tags' => $article_tags,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        // IDを元に記事ファイルの場所を特定と保存
        $draft_id = $article->draft;
        Storage::put($draft_id, $request->file_draft);
        $article->fill($request->all())->save();

        // 記事のID
        $id = $article->id;

        // タグを設定した時のみ更新
        $new_tag = $request->tags;
        if ($new_tag != []){
            Article::find($id)->tags()->sync($new_tag);
        }

        return redirect(route('articles.show', ['article' => $id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $id = $article->id;
        $draft_id = $article->draft;
        Article::destroy($id);
        Storage::delete($draft_id);
        return redirect(route('articles.index'));
    }
}
