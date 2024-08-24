  <style>
    .thumbnail {
      width: 100px;
      height: 100px;
    }
  </style>
  
  @extends('layouts.app')
  
  @section('content') 
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card text-center">
            <div class="card-header">
              投稿一覧
            </div>
            <div class="card-body">
              @foreach($tasks as $task)
                <div class="task-item">
                  <h5 class="card-title">タイトル : {{ $task->name }}</h5>
                  <p class="card-text">内容 : {{ $task->description }}</p>
                  {{-- <p class="card-text">投稿者：{{ $task->user->name }}</p> --}}
                  <a href="{{ route('posts.show', $task->id) }}" class="btn btn-primary">詳細へ</a>
                  
                  @if (App\Models\Bookmark::where('user_id', Auth::id())->where('task_id', $task->id)->exists())
                    <form action="{{ route('unbookmark', $task) }}" method="POST" style="display:inline;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-warning">ブックマーク解除</button>
                    </form>
                  @else
                    <form action="{{ route('bookmark', $task) }}" method="POST" style="display:inline;">
                      @csrf
                      <button type="submit" class="btn btn-success">ブックマークする</button>
                    </form>
                  @endif
  
                  @if($task->image)
                    <div class="image mt-3">
                      <img src="{{ Storage::url('images/' . $task->image) }}" alt="" class="thumbnail">
                    </div>
                  @endif
                </div>
                <div class="card-footer text-muted">
                  投稿日時 : {{ $task->created_at }}
                </div>
              @endforeach
            </div>
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