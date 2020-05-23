<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Guestのshowページ</title>
</head>
<body>
  <h1>{{ $article->title }}</h1>
  <hr>
  <p>
    @forelse ($tags as $tag)
      {{ $tag }}
    @empty
    タグ未設定
    @endforelse
  </p>
  <hr>
  <p>{!! $draft !!}</p>
</body>
</html>