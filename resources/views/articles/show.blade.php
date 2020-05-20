<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $article->title }}</title>
</head>
<body>
  <h1>{{ $article->title }}</h1>
  <div>
  <p>{{ $article->created_at }}</p><br>
  <hr>
  @forelse ($article_tags as $article_tag)
    <a href="{{ route('tags.show', ['tag' => $article_tag->id]) }}">
      {{ $article_tag->name }}
    </a>
  @empty
  <p>タグ未設定</p>
  @endforelse
  <hr>
  <p>{!! $draft !!}</p>
  <hr>
  <p>
    <a href="{{ route('articles.index') }}"><< 記事一覧へ戻る</a>
    |
    <a href="{{ route('articles.edit', ['article' => $article->id]) }}">記事を編集する</a>
  </p>
</body>
</html>