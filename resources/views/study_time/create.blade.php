@extends('layouts.app')
@section('content') 

<div>
    <h1>学習時間の記録</h1>
</div>
<div>
    <form action="{{ route('StudyTime.store') }}" method="POST">
        @csrf
        <div>
            <label for="study_time">勉強時間</label>
            <input type="number" placeholder="勉強時間を記入してください" name="StudyTime" id="StudyTime"  min="0" step="0.1" class="form-control" required>
        </div>
        <div>
            <label for="date">日付</label>
            <input type="date" name="date" id="date" class="form-control" required>
        </div>

        <input type="hidden" name="task_id" value="{{ $taskId }}">

        <button type="submit">記録する</button>
    </form>

    


</div>
@endsection
