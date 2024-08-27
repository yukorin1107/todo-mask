@extends('layouts.app')
@section('content')


  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          @if (Auth::user()->id == $task->user_id)
            <form action="{{ route('posts.update', $task->id) }}" method="POST" enctype="multipart/form-data">
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

  @endsection