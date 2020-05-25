@extends('layouts.guest_main')

@section('page_title')
  タグ一覧
@endsection

@section('main')
<div id="flame" style="height:800px;">
<div class="card">
  <div class="card-body">
    <h1 class="card-title">
      タグ一覧
    </h1>
  </div>
</div>
<br>
<ul class="list-group">
  <li class="list-group-item">
    <form action="{{ route('tags.store') }}" method="POST">
      @csrf
      <label for="new_tag">新規タグ名</label>
      <input id="new_tag" type="text" name="new_tag">
      <input type="submit" value="保存" class="btn btn-secondary btn-sm">
    </form>
  </li>
  @forelse ($tags as $tag)
  <li class="list-group-item">
    <a href="{{ route('tags.show', ['tag' => $tag->id]) }}">
          {{ $tag->name }}
    </a>
    <a href="{{ route('tags.destroy', ['tag' => $tag->id]) }}" onclick="event.preventDefault(); 
            document.getElementById('delete-form').submit();" class="float-right text-dark">
      削除
    </a>
    <form id="delete-form" action="{{ route('tags.destroy', ['tag' => $tag->id]) }}" method="POST">
        @csrf
        @method('DELETE')
      </form>
    <p>
  @empty
  @endforelse
</ul>
{{ $tags->links() }}
</div>
@endsection