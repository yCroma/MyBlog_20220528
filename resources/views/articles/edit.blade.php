@extends('layouts.guest_main')
  
@section('page_title')
  {{ $article->title }}の編集
@endsection

@section('main')
  <div class="card">
    <div class="card-body">
      <h1 class="card-title display-5">
        記事編集
      </h1>
      
      <form action="{{ route('articles.update', ['article' => $article->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <input class="form-control form-control-lg" type="text" name="title" value="{{ $article->title }}">
        <br>
        <!-- 記事に関連づけられたタグを表示 -->
        @forelse ($article_tags as $article_tag)
          <div class="badge badge-secondary">
            {{ $article_tag->name }}
          </div>
        @empty
          <div class="badge badge-secondary">タグ未登録</div>
        @endforelse
        <!-- タグを登録した場合、更新 -->
        <p class="text-dark">タグを更新する</p>
        @forelse ($tags as $tag)
        <input type="checkbox" name="tags[]" value="{{ $tag->id }}">{{ $tag->name }}
        @empty
        <p>登録されているタグはありません</p>
        @endforelse
        <br>
        <textarea id="editor" name="file_draft" cols="30" rows="10" required>{{ $draft }}</textarea>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
        <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
        <script>
          var simplemde = new SimpleMDE({ element: document.getElementById("editor") });
        </script>
        <br>
        <div class="text-right">
          <button type="submit" class="btn btn-secondary btn-sm">記事を更新</button>
        </div>
      </form>
    </div>
  </div>
  
@endsection