@extends('layouts.app')
<head><link rel="stylesheet" href="{{ asset('css/post.show.css') }}"></head>
@section('content') 

  <div class="container">
    <a href="{{ route('posts.index') }}" class="btn btn-primary task-button">
      戻る
    </a>
    <a href="{{ route('mypages.mypage') }}" class="btn btn-primary my-button">
      マイページへ
    </a>
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card mt-3">
                  <div class="card-header">
                      <h5>TASK：{{ $task->name }}</h5>
                  </div>
                  <div class="card-body">
                  <p class="card-text">{{ $task->description }}</p>
                  <p style="color: grey">{{ $task->created_at }}</p> 

                  {{-- <a href="{{ route('posts.edit',$task->id) }}" class="btn btn-primary">編集する</a> --}}

<div id="edit-delete">                  
                  <!-- Button trigger modal -->

                  <button type="button" class="btn btn-primary button-edit-design" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    編集
                  </button> 


                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">編集中</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="container">
                              <div class="row justify-content-center">
                                  <div class="col-md-8">
                                    @if (Auth::user()->id == $task->user_id)
                                      <form action="{{ route('posts.update', $task->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                          <div class="form-group">
                                              <label>タスク</label>
                                              <input type="text" class="form-control" value="{{ $task->name }}" name="name">
                                          </div>
                                          <div class="form-group">
                                              <label>詳細</label>
                                              <textarea class="form-control" rows="5" name="description">{{ $task->description }}</textarea>
                                          </div>
                                          <div class="form-group">
                                            <label for="type">タスクの種類</label>
                                            <select name="type" id="type" class="form-control" required>
                                                <option value="" disabled selected>タスクの種類を選んでください</option>
                                                <option value="Reading">Reading</option>
                                                <option value="Listening">Listening</option>
                                                <option value="Speaking">Speaking</option>
                                                <option value="Writing">Writing</option>
                                                <option value="Vocabulary">Vocabulary</option>
                                            </select>
                                        </div> 
                        
                                        <div class="form-group">
                                            <label for="image">画像登録</label>
                                            <input type="file" class="form-control-file" name='image' id='image'>
                                        </div>
                                          <button type="submit" class="btn btn-primary">更新する</button>
                                      </form>
                                      @endif
                                  </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    @if (Auth::user()->id == $task->user_id)
                    <form action='{{ route('posts.destroy',$task->id) }}' method='post'>
                      @csrf
                      @method('delete')
                        <input type='submit' value='削除' class="btn btn-danger button-delete-design" onclick='return confirm("本当に削除しますか？");'>
                    </form>
                    @endif

  </div>



                  </div>
              </div>
          </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-8">
          {{-- <button type="button" class="btn btn-primary" onclick="window.location='{{ route('notes.create', $task->id) }}'">メモを追加</button> --}}

          <div class="col-md-8 mt-5">
            <p id="note-header">--- メモ一覧 ---</p>
            @foreach($task->notes as $note)
              <div class="card mt-3">
                  {{-- <h5 class="card-header">投稿者：{{ $note->user->name }}</h5> --}}
                  <div class="card-body">
                      {{-- <h5 class="card-title">投稿日時：{{ $note->created_at }}</h5> --}}
                      <p class="card-text"> {{ $note->body }}</p>
                  </div>
              </div>
            @endforeach
          </div>

          <!-- Button trigger modal -->
          <div id="note-button-parent">
            <button type="button" class="btn btn-primary button-note-design" data-bs-toggle="modal" data-bs-target="#exampleModalMemo">
              メモを追加
            </button> 
          </div>

          <!-- Modal -->
          <div class="modal fade" id="exampleModalMemo" tabindex="-1" aria-labelledby="exampleModalMemoLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">メモ</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="container">
                    <div class="row justify-content-center mt-5">
                        
                            
                      <div class="card mt-3">
                          <div class="card-header">
                              <h5>TASK：{{ $task -> name }}</h5>
                          </div>
                          <div class="card-body">
                              <p class="card-text">{{ $task -> description }}</p>
                          </div>
                      </div>
                        
                    </div>
                    <div class="row justify-content-center mt-5">
                        <div class="col-md-8">
                            <form action="{{ route('notes.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="task_id" value="{{ $task -> id }}">
                                <div class="form-group">
                                    <label>メモ</label>
                                    <textarea class="form-control" 
                                    placeholder="内容" rows="5" name="body" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary mt-3">メモを追加</button>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
      <div class="row justify-content-center">


      </div> 
  </div>

@endsection 
