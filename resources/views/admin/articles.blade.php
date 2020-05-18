<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>記事一覧</title>
</head>
<body>
  <h1>記事一覧です。</h1>
  <ul>
    @foreach ($articles as $article)
    <li>{{ $article->title }}</li>
    @endforeach
  </ul>
</body>
</html>