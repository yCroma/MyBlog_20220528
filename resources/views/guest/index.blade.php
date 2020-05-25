@extends('layouts.guest_main')

@section('page_title')
  Cromalog
@endsection

@section('main')
<div id="flame" style="height:800px;">
<ul class="list-group mt-2" >
  @forelse ($articles as $article)
  <li class="list-group-item">
    <p>投稿日:{{ $article->created_at }}</p>
    <a href="{{ route('guest.show', ['file_name' => $article->draft]) }}">
      <h3 class="text-dark">
        {{ $article->title }}
      </h3>
    </a>
    <br>
    <div class="text-right">
    @forelse ($article->tags as $tag)
      <a class="badge badge-secondary" href="{{ route('guest.tag', ['tag_name' => $tag->name]) }}">
        {{ $tag->name }}
      </a>
    @empty
      <p class="badge badge-secondary">タグ未登録</p>
    @endforelse
    </div>
  </li>
  @empty
  @endforelse
</ul>
{{ $articles->links() }}
</div>
@endsection