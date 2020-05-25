@extends('layouts.guest_main')

@section('page_title')
  Admin
@endsection

@section('main')
  <div id="flame" style="height:800px;">
  <div class="card">
    <div class="card-body">
      <h1 class="card-title">
        AdminのIndexページ
      </h1>
      <p class="card-text">
        <ul class="list-group">
          <li class="list-group-item">
            <a href="{{ route('articles.create') }}" class="text-dark">
              新規記事作成
            </a>
          </li>
          <li class="list-group-item">
            <a href="{{ route('articles.index') }}" class="text-dark">
              記事一覧へ
            </a>
          </li>
          <li class="list-group-item">
            <a href="{{ route('tags.index') }}" class="text-dark">
              タグ一覧へ
            </a>
          </li>
        </ul>
      </p>
    </div>
  </div>

  <form id="logout-form" action="{{ route('logout') }}" method="POST">
    @csrf
  </form>
  </div>
@endsection