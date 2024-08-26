{{-- <style>
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
                <h1>よくぞ試練を乗り越えた。主はもっと強くなれる。</h1>
                <div class="card text-center">
                    <div class="card-header">
                        完了タスク一覧
                    </div>
                    <div class="card-body">
                        @foreach(['Reading', 'Listening', 'Speaking', 'Writing', 'Vocabulary'] as $type)
                            <h3>{{ $type }}</h3>
                            <hr>
                        @foreach($completedTasks->where('type', $type) as $task)
                            <div class="task-item mb-4">
                                <h5 class="card-title">タイトル : {{ $task->name }}</h5>
                                <p class="card-text">内容 : {{ $task->description }}</p>

                                @if($task->image)
                                    <div class="image mt-3">
                                        <img src="{{ Storage::url('images/' . $task->image) }}" alt="" class="thumbnail">
                                    </div>
                                @endif

                                <div class="card-footer text-muted">
                                    完了日時 : {{ $task->updated_at }} 
                                </div>
                            </div>
                        @endforeach
                            <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}

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
                <h2>完了画面</h2>
                <h1 class="display-3 text-white bg-dark font-weight-bolder text-uppercase text-center p-4 shadow-lg">
                    よくぞ試練を乗り越えた。お主はもっと強くなれる。
                </h1>
                <div class="card text-center">
                    <div class="card-header">
                        完了タスク一覧
                    </div>
                    <div class="card-body">
                        @foreach(['Reading', 'Listening', 'Speaking', 'Writing', 'Vocabulary'] as $type)
                            <h3>{{ $type }}</h3>
                            <hr>
                            @foreach($completedTasks->where('type', $type) as $task)
                                <div class="task-item mb-4">
                                    <h5 class="card-title">タイトル : {{ $task->name }}</h5>
                                    <p class="card-text">内容 : {{ $task->description }}</p>

                                    @if($task->image)
                                        <div class="image mt-3">
                                            <img src="{{ Storage::url('images/' . $task->image) }}" alt="" class="thumbnail">
                                        </div>
                                    @endif

                                    <div class="card-footer text-muted">
                                        完了日時 : {{ $task->updated_at }} 
                                    </div>
                                </div>
                            @endforeach
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

