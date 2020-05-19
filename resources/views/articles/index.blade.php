<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>記事一覧</title>
</head>
<body>
  <h1>記事一覧です。</h1>
  <table>
    @forelse ($articles as $article)
    <tr>
      <td>
        <a href="{{ route('articles.show', ['article' => $article->id]) }}">
          {{ $article->title }}
        </a>
      </td>
      <td>
        <a href="{{ route('articles.edit', ['article' => $article->id]) }}">
          編集
        </a>
      </td>
      <td>
        <form action="{{ route('articles.destroy', ['article' => $article->id]) }}" method="POST">
          @csrf
          @method('DELETE')
          <input type="submit" value="記事削除">
        </form>
      </td>
    </tr>
    @empty
      <div>該当する記事は0件です。</div>
    @endforelse
  </table>
</body>
</html>