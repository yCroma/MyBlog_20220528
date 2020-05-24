<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Guestページ</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <h1>Guestページ</h1>
    <ul class="list-group">
      @forelse ($articles as $article)
        <li class="list-group-item">
          <a href="{{ route('guest.show', ['file_name' => $article->draft]) }}">
            {{ $article->title }}
          </a>
          <hr>
          @forelse ($article->tags as $tag)
            <a href="{{ route('guest.tag', ['tag_name' => $tag->name]) }}">
              {{ $tag->name }}
            </a>
          @empty
            タグ未登録
          @endforelse
        </li>
      @empty
      @endforelse
    </ul>
    {{ $articles->links() }}
  </div>
</body>
</html>