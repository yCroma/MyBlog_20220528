<?php

namespace App\Http\Controllers;

use App\Article;
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
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $draft_id = uniqid(dechex(rand()));
        $draft = $request->draft;
        Storage::put($draft_id, $draft);

        $article = Article::create([
            'title' => $request->title,
            'draft' => $draft_id,
        ]);
        $id = $article -> id;
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
        $draft = Storage::get($article->draft);

        $parser = new \cebe\markdown\GithubMarkdown();
        $parse_draft = $parser->parse($draft);

        return view('articles.show', ['article' => $article, 'draft' => $parse_draft]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $draft = Storage::get($article->draft);
        return view('articles.edit', ['article' => $article, 'draft' => $draft]);
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
        $draft_id = $article->draft;
        Storage::put($draft_id, $request->file_draft);
        $article->fill($request->all())->save();
        $id = $article->id;
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
