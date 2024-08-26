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
                  {{-- <a href="{{ route('posts.edit',$task->id) }}" class="btn btn-primary">編集する</a> --}}

                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Edit
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                  @if (Auth::user()->id == $task->user_id)
                                    <form action="{{ route('posts.update', $task->id) }}" method="POST">
                                      @csrf
                                      @method('put')
                                        <div class="form-group">
                                            <label>タイトル</label>
                                            <input type="text" class="form-control" value="{{ $task->name }}" name="name">
                                        </div>
                                        <div class="form-group">
                                            <label>内容</label>
                                            <textarea class="form-control" rows="5" name="description">{{ $task->description }}</textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">更新する</button>
                                    </form>
                                    @endif
                                </div>
                            </div>
                          </div>
                        </div>
                        {{-- <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div> --}}
                      </div>
                    </div>
                  </div>
                  @if (Auth::user()->id == $task->user_id)
                  <form action='{{ route('posts.destroy',$task->id) }}' method='post'>
                    @csrf
                    @method('delete')
                      <input type='submit' value='Delete' class="btn btn-danger" onclick='return confirm("本当に削除しますか？");'>
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