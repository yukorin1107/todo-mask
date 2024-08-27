@extends('layouts.app')
@section('content') 

<div>
    <p> {{ Auth::user()->name }} さんの目標：<br>
        {{ $goal -> goal_body }}
    </p>
</div>

<div>

    <a href="{{ route('goals.edit', $goal->id) }}" class="btn btn-primary">編集する</a>
    <a href="{{ route('FirstTask.create') }}" class="btn btn-primary">次へ</a>

</div>



@endsection