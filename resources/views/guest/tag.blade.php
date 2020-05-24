@extends('layouts.guest_main')

@section('page_title')
  {{ $tag->name }}の検索結果
@endsection

@section('main')
  <ul class="list-group mb-2">
    <li class="list-group-item mt-2">
      <h2 class="mt-3"> 
          {{ $tag->name }}に関する記事
      </h2>
    </li>
    @forelse ($tag_articles as $tag_article)
    <li class="list-group-item">
      <p>投稿日:{{ $tag_article->created_at }}</p>
      <a href="{{ route('guest.show', ['file_name' => $tag_article->draft]) }}">
        <h3 class="text-dark">
          {{ $tag_article->title }}
        </h3>
      </a>
      <br>
      <div class="text-right">
      @forelse ($tag_article->tags as $tag)
        <a class="badge badge-secondary" href="{{ route('guest.tag', ['tag_name' => $tag->name]) }}">
          {{ $tag->name }}
        </a>
      @empty
        <p>タグ未登録</p>
      @endforelse
      </div>
    </li>
    @empty
    @endforelse
  </ul>
@endsection