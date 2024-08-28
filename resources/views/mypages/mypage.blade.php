<!-- resources/views/mypage.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>My Page</h1>

    {{-- <div class="calendar">
        <!-- カレンダーの表示 -->
        @include('partials.calendar')
    </div> --}}

    <div class="profile-image">
        <img src="{{ Auth::user()->profile_image ? asset('images/' . Auth::user()->profile_image) : asset('img/mypage/default-profile.png') }}" alt="プロフィール画像" style="width:150px; height:150px; border-radius:50%;">
    </div>

    <form action="{{ route('profile.image.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="profile_image">プロフィール画像を変更する</label>
            <input type="file" class="form-control-file" id="profile_image" name="profile_image">
        </div>
        <button type="submit" class="btn btn-primary">更新する</button>
    </form>

    <div class="goals">
        <h2><img src="{{  asset('img/mypage/goal.png') }}" alt="">学習目標</h2>
        <ul>
            @foreach($goals as $goal)
                <li>
                    <p>{{ $goal->goal_body }}</p>

                    <a href="{{ route('goalsprofile.edit', $goal->id) }}" class="btn btn-secondary">Edit</a>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="login-streak">

        <h2><img src="{{  asset('img/mypage/炎.png') }}" alt=""> {{ $consecutiveLoginDays }} 日</h2> 
        <p>連続ログイン履歴</p>
    </div> 

    <div class="study-time">
        <h2><img src="{{  asset('img/mypage/studytime.png') }}" alt="">{{ $StudyTime }} 時間</h2>
        <p>合計学習時間</p>

    </div>
</div>
@endsection
