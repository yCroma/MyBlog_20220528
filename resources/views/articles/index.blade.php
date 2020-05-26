@extends('layouts.guest_main')

@section('page_title')
  記事一覧
@endsection

@section('main')

<div id="flame" style="height:800px;">
<ul class="list-group mt-2" >
  @forelse ($articles as $article)
  <li class="list-group-item">
    <div>
      投稿日:{{ $article->created_at }}

      <form action="{{ route('articles.destroy', ['article' => $article->id]) }}" method="POST" class="float-right">
        @csrf
        @method('DELETE')
        <input type="submit" value="削除" class="btn btn-light btn-sm">
      </form>

      <a href="{{ route('articles.edit', ['article' => $article->id]) }}" class="float-right btn btn-light btn-sm">
        編集
      </a>
    </div>
    
    <a href="{{ route('articles.show', ['article' => $article->id]) }}">
      <h3 class="text-dark">
        {{ $article->title }}
      </h3>
    </a>
    <div class="text-right">
    @forelse ($article->tags as $tag)
      <a class="badge badge-secondary" href="{{ route('tags.show', ['tag' => $tag->id]) }}">
        {{ $tag->name }}
      </a>
    @empty
      <p>
        <a class="badge badge-secondary" href="">
          タグ未登録
        </a>
      </p>
    @endforelse
    </div>
  </li>
  @empty
  @endforelse
</ul>
{{ $articles->links() }}
</div>
@endsection