<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
</head>
<body>
  <h1>AdminのIndexページ</h1>
  <ul>
    <li><a href="{{ route('articles.index') }}">記事一覧へ</a></li>
    <li><a href="{{ route('tags.index') }}">タグ一覧へ</a></li>
  </ul>
</body>
</html>