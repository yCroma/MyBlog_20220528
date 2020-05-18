<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>新規記事作成</title>
</head>
<body>
  <h1>新規記事作成</h1>
  <form action="{{ route('articles.store') }}" method="post">
    @csrf
    <input type="text" name="title" placeholder="タイトル">
    <br>
    <textarea name="draft" cols="30" rows="10"></textarea>
    <br>
    <button type="submit">記事を投稿</button>
  </form>
</body>
</html>