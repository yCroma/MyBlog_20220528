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
    <!-- 記事のタイトルを表示 -->
    <input type="text" name="title" value="{{ $article->title }}">
    <br>
    <!-- 記事に関連づけられたタグを表示 -->
    @forelse ($article_tags as $article_tag)
      {{ $article_tag }}
    @empty
    <div>タグ未登録</div>
    @endforelse
    <br>
    <!-- 登録されているタグを表示 -->
    @forelse ($tags as $tag)
      <input type="checkbox" name="tags[]" value="{{ $tag->id }}">{{ $tag->name }}
    @empty
    <div>タグ未登録</div>
    @endforelse
    <br>
    <!-- エディター -->
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