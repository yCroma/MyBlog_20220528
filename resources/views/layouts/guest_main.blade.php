@extends('layouts.guest')

@section('contents')
<!-- main コンテンツ -->
<main class="col-12 col-md-9 col-lg-7 order-2 bg-light m-2">
  @yield('main')
</main>
<!-- sidebar コンテンツ -->
<!-- sidebar-right -->
<div id="sidebar-right" class="d-none d-md-block col-md-2 col-lg-2 order-3 bg-light">
  <div class="card border-secondary m-2">
    <div class="card-body text-secondary">
      <p class="card-text text-center">
      @foreach ($view_tags as $view_tag)
        <a href="{{ route('guest.tag', ['tag_name' => $view_tag->name]) }}">
          {{ $view_tag->name }}
        </a>
      @endforeach
      </p>
    </div>
  </div>
</div>
<!-- sidebar-left -->
<div id="sidebar-left" class="d-none d-lg-block col-lg-2 order-1 bg-primary">
  <!-- ここに自分のコメントをかく -->
</div>
@endsection