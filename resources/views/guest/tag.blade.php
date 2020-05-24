<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $tag->name }}の検索結果</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <h1>{{ $tag->name }}</h1>
    <ul class="list-group">
      @forelse ($tag_articles as $tag_article)
        <li class="list-group-item">
          <a href="{{ route('guest.show', ['file_name' => $tag_article->draft]) }}">
            {{ $tag_article->title }}
          </a>
          <hr>
          @forelse ($tag_article->tags as $tag)
            {{ $tag->name }}
          @empty
            タグ未登録
          @endforelse
        </li>
      @empty
      @endforelse
    </ul>
  </div>
</body>
</html>