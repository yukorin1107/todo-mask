@extends('layouts.app')
@section('content') 

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- ユーザーがこの目標を編集できるか確認 -->
            @if (Auth::user()->id == $goal->user_id)
                <h1>新しい目標は何にしますか？</h1>
                
                <!-- フォームの開始 -->
                <form action="{{ route('goals.update', $goal->id) }}" method="POST">
                    @csrf
                    @method('put')

                    <div class="form-group">
                        <label for="goal_body">目標</label>
                        <input type="text" id="goal_body" name="goal_body" class="form-control" placeholder="目標を記入してください" value="{{ old('goal_body', $goal->goal_body) }}">
                        @error('goal_body')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">更新する</button>
                </form>
            @else
                <p>この目標を編集する権限がありません。</p>
            @endif
        </div>
    </div>
</div>

@endsection
