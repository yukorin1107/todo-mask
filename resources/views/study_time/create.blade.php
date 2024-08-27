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
<<<<<<< HEAD:resources/views/study_time/create.blade.php
        <input type="hidden" name="task_id" value="{{ $taskId }}">
        <button type="submit">OK</button>
=======
        <button type="submit">記録する</button>

        {{-- <script>
            function submitForm() {
                alert('学習時間が記録されました');
                document.getElementById('studyTimeForm').submit(); // Submit the form after the alert
            }
        </script> --}}
>>>>>>> origin/studytime_in_mypage_mai:resources/views/StudyTime/create.blade.php
    </form>

    


</div>
@endsection
