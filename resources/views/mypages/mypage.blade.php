<!-- resources/views/mypage.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>My Page</h1>

    {{-- <div class="calendar">
        <!-- カレンダーの表示 -->
        @include('partials.calendar')
    </div> --}}

    <div class="goals">
        <h2>Your Goals</h2>
        <ul>
            @foreach($goals as $goal)
                <li>
                    {{-- <a href="{{ route('goals.show', $goal->id) }}">{{ $goal->goal_body }}</a> --}}
                    <p>目標: {{ $goal->goal_body }}</p>
                    <a href="{{ route('goals.edit', $goal->id) }}" class="btn btn-secondary">Edit</a>
                    {{-- <form action="{{ route('goals.destroy', $goal->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form> --}}
                </li>
            @endforeach
        </ul>
    </div>

    <div class="login-streak">
        <h2>Consecutive Login Days: # </h2>
    </div>

    <div class="study-time">
        <h2>Study Time: # hours</h2>
    </div>
</div>
@endsection
