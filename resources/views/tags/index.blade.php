<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>タグ一覧</title>
</head>
<body>
  <h1>タグ一覧です。</h1><br>
  <form action="{{ route('tags.store') }}" method="POST">
    @csrf
    <label for="new_tag">新規タグ名</label>
    <input id="new_tag" type="text" name="new_tag">
    <input type="submit" value="保存">
  </form>
  <hr>
  <table>
    @forelse ($tags as $tag)
    <tr>
      <td>
        <a href="{{ route('tags.show', ['tag' => $tag->id]) }}">
          {{ $tag->name }}
        </a>
      </td>
      <td>
        <form action="{{ route('tags.destroy',['tag' => $tag->id]) }}" method="POST">
          @csrf
          @method('DELETE')
          <input type="submit" value="削除する">
        </form>
      </td>
    </tr>
    @empty
      <div>タグはありません。新規作成してください。</div>
    @endforelse
  </table>
</body>
</html>