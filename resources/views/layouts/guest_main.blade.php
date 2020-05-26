@extends('layouts.guest')

@section('contents')
<!-- main コンテンツ -->
<main class="col-12 col-md-9 col-lg-7 order-2 bg-light m-2" >
  @yield('main')
</main>
<!-- sidebar コンテンツ -->
<!-- sidebar-right -->
<div id="sidebar-right" class="d-none d-md-block col-md-2 col-lg-2 order-3 mt-2 bg-light">
  <div class="card m-2">
    <div class="card-body">
      <p class="card-text">
      @auth
        @forelse ($view_tags as $view_tag)
          <a href="/admin/tags/{{ $view_tag->id }}" class="text-secondary">
            {{ $view_tag->name }}
            <hr>
          </a>
        @empty
         <p class="text-secondary">タグ未登録</p>
        @endforelse
        </p>
      @else
        @forelse ($view_tags as $view_tag)
          <a href="{{ route('guest.tag', ['tag_name' => $view_tag->name]) }}" class="text-secondary">
            {{ $view_tag->name }}
            <hr>
          </a>
        @empty
         <p class="text-secondary">タグ未登録</p>
        @endforelse
      </p>
      @endauth
    </div>
  </div>
</div>
<!-- sidebar-left -->
<div id="sidebar-left" class="d-none d-lg-block col-lg-2 order-1 bg-info">
  <!-- ここに自分のコメントをかく -->
</div>
@endsection