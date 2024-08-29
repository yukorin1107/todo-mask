<!-- resources/views/mypage.blade.php -->
@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
<div class="d-flex justify-content-between mb-2 mb-md-0">
    <a href="{{ route('posts.index') }}" class="btn btn-primary task-button">
        タスク一覧へ
    </a>
    <a href="{{ route('Complete.index') }}" class="btn btn-primary button-complete">
        完了一覧画面へ
    </a>
</div>
<div class="container">
    <div class="top">
    <h1>My Page</h1>
    </div>

<div class="profile-image">
        <img src="{{ Auth::user()->profile_image ? asset('images/' . Auth::user()->profile_image) : asset('img/mypage/default-profile.png') }}" alt="プロフィール画像" style="width:220px; height:220px; border-radius:50%;">
</div>

    <form action="{{ route('profile.image.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="profile_image"></label>
            <input type="file" class="form-control-file" id="profile_image" name="profile_image">
        <button type="submit" class="btn btn-primary">更新</button>
    </form>
    <form action="{{ route('profile.image.delete') }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit" class="btn btn-danger">削除</button>
    </form>
        </div>
    

        <div class="username">
            <h2>{{ $user->name }}</h2>
        </div>

        <span class="box-title"><img src="{{  asset('img/mypage/goal.png') }}" alt="">学習目標</span>

        <div class="goals">
            @foreach($goals as $goal)
                    <p>{{ $goal->goal_body }}</p>

            <div class="edit">
                        <a href="{{ route('goalsprofile.edit', $goal->id) }}" class="btn btn-secondary">Edit</a>
            </div>
            @endforeach
        </div>
        <br>
        
        <span class="box-title"><img src="{{  asset('img/mypage/goal.png') }}" alt="">学習記録</span>
    <div class=kiroku>
        <div class="login-streak">
        <h2><img src="{{  asset('img/mypage/炎.png') }}" alt=""> {{ $consecutiveLoginDays }}  日</h2> 

        <p>連続ログイン履歴</p>
        </div> 

        <div class="study-time">
        <h2><img src="{{  asset('img/mypage/studytime.png') }}"  alt="">{{ $StudyTime }} h</h2>
        <p>合計学習時間</p>
        </div>
    </div>
    </div>
@endsection
