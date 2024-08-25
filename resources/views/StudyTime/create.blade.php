@extends('layouts.app')
@section('content') 

<div>
    <h1>勉強時間を入力してください</h1>
</div>
<div>
    <form action="{{ route('StudyTime.store') }}" method="POST">
        @csrf
        <div>
            <label>勉強時間</label>
            <input type="number" placeholder="勉強時間を記入してください" name="StudyTime"  min="0" step="0.1">
        </div>
        <div>
            <label>日付</label>
            <input type="date" name="date" required>
        </div>
        <button type="submit">OK</button>
    </form>
</div>
@endsection
