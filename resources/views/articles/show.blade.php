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
    {{ $article_tag }}
  @empty
  <p>タグ未設定</p>
  @endforelse
  <hr>
  <p>{!! $draft !!}</p>
  <hr>
  <p><a href="{{ route('articles.index') }}"><< 記事一覧へ戻る</a></p>
</body>
</html>