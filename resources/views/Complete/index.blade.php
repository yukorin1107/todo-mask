@extends('layouts.app')

@section('content')

<div>
    <h1>完了したタスク</h1>
</div>
<div>
    @foreach($completedTasks as $task)
        <div class="task-item mb-4">
            <h5 class="card-title">タイトル : {{ $task->name }}</h5>
            <p class="card-text">内容 : {{ $task->description }}</p>
            <div class="card-footer text-muted">
                投稿日時 : {{ $task->created_at }}
            </div>
        </div>
    @endforeach
</div>

@endsection
