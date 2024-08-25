@extends('layouts.app')

@section('content')
<div>
    <h1>完了したタスク</h1>
    @foreach ($completedTasks as $task)
        <div>
            <p>{{ $task->name }}</p>
        </div>
    @endforeach
</div>
@endsection