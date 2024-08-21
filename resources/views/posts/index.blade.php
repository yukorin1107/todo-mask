@extends('layouts.app')
@section('content') 

  <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center">
            <div class="card-header">
                投稿一覧
            </div>
            @foreach($tasks as $task)
            <div class="card-body">
                <h5 class="card-title">タイトル : {{ $task->name }}</h5>
                <p class="card-text">
                  内容 : {{ $task->description }}
                </p>
                {{-- <p class="card-text">投稿者：{{ $task->user->name }}</p> --}}
                <a href="{{ route('posts.show', $task->id) }}" class="btn btn-primary">詳細へ</a>
            </div>
            <div class="card-footer text-muted">
                投稿日時 : {{ $task->created_at }}
            </div>
            @endforeach
        </div>
        </div>
        <div class="col-md-2">
          <a href="{{ route('posts.create') }}" class="btn btn-primary">
            新規投稿
          </a>
        </div>
    </div>
  </div>
  @endsection