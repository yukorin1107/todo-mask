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
                    よくぞ試練を乗り越えた。<br>お主はもっと強くなれる。
                </h1>
                <div class="card text-center">
                    <div class="card-header">
                        完了タスク一覧
                    </div>
                    <div class="card-body">
                        <div class="accordion" id="accordionExample">
                            @foreach(['Reading', 'Listening', 'Speaking', 'Writing', 'Vocabulary'] as $index => $type)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading{{ $index }}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="false" aria-controls="collapse{{ $index }}">
                                            {{ $type }}
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $index }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $index }}" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            @foreach($completedTasks->where('type', $type) as $task)
                                                <div class="task-item mb-4">
                                                    <h5 class="card-title">タイトル : {{ $task->name }}</h5>
                                                    <p class="card-text">内容 : {{ $task->description }}</p>
                                                    @if (Auth::user()->id == $task->user_id)
                                                    <form action='{{ route('posts.destroy',$task->id) }}' method='post'>
                                                    @csrf
                                                    @method('delete')
                                                        <input type='submit' value='Delete' class="btn btn-danger" onclick='return confirm("お前に教えることはもう何もない...");'>
                                                    </form>
                                                    @endif
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
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


