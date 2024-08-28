@extends('layouts.app')
<head>
    <link rel="stylesheet" href="{{ asset('css/StudyTime.create.css') }}">
</head>
@section('content') 
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="text-center mb-4">
                <h1 class="display-4">学習時間の記録</h1>
            </div>
            <div class="card shadow">
                <div class="card-body">
                    <form action="{{ route('StudyTime.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="StudyTime" class="form-label">勉強時間</label>
                            <input type="number" placeholder="勉強時間を記入してください" name="StudyTime" id="StudyTime" min="0" step="0.1" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">日付</label>
                            <input type="date" name="date" id="date" class="form-control" required>
                        </div>
                        <input type="hidden" name="task_id" value="{{ $taskId }}">
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg">記録する</button>
                            <a href="{{ route('posts.index') }}" class="btn btn-primary btn-lg back-button">戻る</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
