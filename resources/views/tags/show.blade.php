@extends('layouts.guest_main')

@section('page_title')
  {{ $tag->name }}の記事一覧
@endsection

@section('main')
  <ul class="list-group mb-2">
    <li class="list-group-item mt-2">
      <h2 class="mt-3"> 
          {{ $tag->name }}の記事一覧
      </h2>
    </li>
    @forelse ($articles as $article)
    <li class="list-group-item">
      <p>投稿日:{{ $article->created_at }}</p>
      <a href="{{ route('articles.show', ['article' => $article->id]) }}">
        <h3 class="text-dark">
          {{ $article->title }}
        </h3>
      </a>
      <br>
      <div class="text-right">
      @forelse ($article->tags as $tag)
        <a class="badge badge-secondary" href="/admin/tags/{{ $tag->id }}">
          {{ $tag->name }}
        </a>
      @empty
        <p>タグ未登録</p>
      @endforelse
      </div>
    </li>
    @empty
    <li class="list-group-item mt-2">
      投稿されている記事はありません
    </li>
    @endforelse
  </ul>
@endsection