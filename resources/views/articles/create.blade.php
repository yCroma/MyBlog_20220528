@extends('layouts.guest_main')

@section('page_title')
  新規記事作成
@endsection

@section('main')
  <div class="card">
    <div class="card-body">
      <h1 class="card-title display-5">
        新規記事作成
      </h1>
      <form action="{{ route('articles.store') }}" method="post">
        @csrf
        <input class="form-control form-control-lg" type="text" name="title" placeholder="タイトル">
        <br>
        <p class="text-dark">タグをつける</p>
        @forelse ($tags as $tag)
        <input type="checkbox" name="tags[]" value="{{ $tag->id }}">{{ $tag->name }}
        @empty
        <p>登録されているタグはありません</p>
        @endforelse
        <br>
        <textarea id="editor" name="draft" cols="30" rows="10"></textarea>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
        <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
        <script>
          var simplemde = new SimpleMDE({ element: document.getElementById("editor") });
        </script>
        <br>
        <div class="text-right">
          <button type="submit" class="btn btn-secondary btn-sm">記事を投稿</button>
        </div>
      </form>
    </div>
  </div>
  
@endsection