<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $article->title }}</title>
</head>
<body>
  <h1>{{ $article->title }}</h1>
  <div>
  <p>{{ $article->created_at }}</p><br>
  <hr>
  <p>{{ $article->draft }}</p>
  </div>
</body>
</html>