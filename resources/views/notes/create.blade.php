@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <h2>NOTE</h2>
            <div class="card mt-3">
                <div class="card-header">
                    <h5>タイトル：{{ $task -> name }}</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">内容：{{ $task -> description }}</p>
                    <p>投稿日時：{{ $task -> created_at }}</p>
                </div>
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
@endsection
