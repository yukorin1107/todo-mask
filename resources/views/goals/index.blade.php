@extends('layouts.app')
@section('content') 
<div>
    @foreach($goals as $goal)
    <h3>目標：{{ $goal->goal_body }}</h3>
    @endforeach
</div>

@endsection