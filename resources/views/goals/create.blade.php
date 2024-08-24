@extends('layouts.app')
@section('content') 

<div>
    <h1>目標を入力しよう!</h1>
</div>
<div>
    <form action="{{ route('goals.store') }}" method="POST">
        @csrf
        <div>
            <label>目標</label>
            <input type="text" placeholder="目標を記入してください" name="goal_body">
        </div>
        <button type="submit">作成</button>
    </form>
</div>
@endsection