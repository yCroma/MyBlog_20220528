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
  <p>{!! nl2br(e($draft)) !!}</p>
  </div>
  <p><a href="{{ route('articles.index') }}"><< 記事一覧へ戻る</a></p>
</body>
</html>