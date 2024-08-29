@extends('layouts.app')
@section('content') 
<link rel="stylesheet" href="{{ asset('css/goal.create.css') }}">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <p id="greeting"> Welcome to ENGLISH TASK </p>

            <p id="first-description">タスクを毎日管理して、<br>効率的に学習をすすめましょう</p>

            <div id="goal-design-parent"> {{-- class="card" --}}
                {{-- <div class="card-header text-center bg-primary text-white">
                    <h2>目標を入力しよう!</h2>
                </div> --}}
                <div id="goal-design">
                    <form action="{{ route('goals.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="goal_body" class="form-label">STEP1: 目標の設定</label>
                            <input type="text" class="form-control" id="goal_body" name="goal_body" placeholder="例）TOEIC800点" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success goal-create">作成</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection