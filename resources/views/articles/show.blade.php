@extends('layouts.guest_main')

@section('page_title')
  {{ $article->title }}
@endsection

@section('main')

  <div class="card my-2">
    <div class="card-body" style="height:800px;">
      <p class="card-text">
        投稿日: {{ $article->created_at }}
      </p>
      <h1 class="card-title display-5">
        {{ $article->title }}
      </h1>
      <p>
      @forelse ($article_tags as $article_tag)
        <a class="badge badge-secondary" href="/admin/tags/{{ $article_tag->id }}">
        {{ $article_tag->name }}
      </a>
      @empty
      <p>タグ未設定</p>
      @endforelse
      </p>
      <article>
        {!! $draft !!}
      </article>
    </div>
  </div>
  <p>
    <a href="{{ route('articles.index') }}" class="text-dark">
      << 記事一覧へ戻る
    </a>
      |
    <a href="{{ route('articles.edit', ['article' => $article->id]) }}" class="text-dark">
      記事を編集する
    </a>
  </p>
@endsection