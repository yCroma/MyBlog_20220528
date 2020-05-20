<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $tag->name }}の記事一覧</title>
</head>
<body>
  <h1>{{ $tag->name }}の記事一覧</h1>
  <div>
    <table>
      @forelse ($articles as $article)
      <tr>
        <td>
          <a href="{{ route('articles.show', ['article' => $article->id]) }}">
            {{ $article->title }}
          </a>
        </td>
      </tr>
      @empty
      <tr>
        <td>{{ $tag->name }}の記事はありません。</td>
      </tr>
      @endforelse
    </table>
  </div>
</body>
</html>