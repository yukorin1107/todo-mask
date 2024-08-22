@extends('layouts.app')
@section('content')


  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
        </div>
    </div>
  </div>

  @endsection