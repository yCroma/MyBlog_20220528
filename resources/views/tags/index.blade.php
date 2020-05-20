<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>タグ一覧</title>
</head>
<body>
  <h1>タグ一覧です。</h1>
  <table>
    @forelse ($tags as $tag)
    <tr>
      <td>
        {{ $tag->name }}
      </td>
    </tr>
    @empty
      <div>タグはありません。新規作成してください。</div>
    @endforelse
  </table>
</body>
</html>