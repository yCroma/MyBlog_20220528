@extends('layouts.guest_main')

@section('page_title')
  {{ $article->title }}
@endsection

@section('main')
  <div class="card my-2">
    <div class="card-body" style="height:800px;">
      <p class="card-text">
        投稿日: {{ $article->created_at }}
      </p>
      <h1 class="card-title display-5">
        {{ $article->title }}
      </h1>
      <p>
      @forelse ($tags as $tag)
        <a class="badge badge-secondary" href="{{ route('guest.tag', ['tag_name' => $tag->name]) }}">
        {{ $tag->name }}
      </a>
      @empty
      @endforelse
      </p>
      <article>
        {!! $draft !!}
      </article>
    </div>
  </div>
@endsection