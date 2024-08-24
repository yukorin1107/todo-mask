@extends('layouts.app')
@section('content') 

  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card mt-3">
                  <div class="card-header">
                      <h5>タイトル：{{ $task->name }}</h5>
                  </div>
                  <div class="card-body">
                  <p class="card-text">内容：{{ $task->description }}</p>
                  <p>投稿日時：{{ $task->created_at }}</p>
                  <a href="{{ route('posts.edit',$task->id) }}" class="btn btn-primary">編集する</a>
                  @if (Auth::user()->id == $task->user_id)
                  <form action='{{ route('posts.destroy',$task->id) }}' method='post'>
                    @csrf
                    @method('delete')
                      <input type='submit' value='削除' class="btn btn-danger" onclick='return confirm("本当に削除しますか？");'>
                  </form>
                  @endif
                  </div>
              </div>
          </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-8">
                <button type="button" class="btn btn-primary" onclick="window.location='{{ route('notes.create', $task->id) }}'">メモを追加</button>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
          メモ一覧
          @foreach($task->notes as $note)
            <div class="card mt-3">
                <h5 class="card-header">投稿者：{{ $note->user->name }}</h5>
                <div class="card-body">
                    <h5 class="card-title">投稿日時：{{ $note->created_at }}</h5>
                    <p class="card-text">内容：{{ $note->body }}</p>
                </div>
            </div>
          @endforeach
        </div>
      </div>
  </div>

@endsection