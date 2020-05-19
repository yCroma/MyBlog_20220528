<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $article->title }}の編集</title>
</head>
<body>
  <form action="{{ route('articles.update', ['article' => $article->id]) }}" method="post">
    @csrf
    @method('put')
    <input type="text" name="title" value="{{ $article->title }}">
    <br>
    <textarea id="editor" name="file_draft" cols="30" rows="10" required>{{ $draft }}</textarea>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
    <script>
      var simplemde = new SimpleMDE({ element: document.getElementById("editor") });
    </script>

    <br>
    <button type="submit">投稿</button>
  </form>
</body>
</html>