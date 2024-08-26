@extends('layouts.app')
@section('content') 

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center bg-primary text-white">
                    <h2>目標を入力しよう!</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('goals.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="goal_body" class="form-label">目標</label>
                            <input type="text" class="form-control" id="goal_body" name="goal_body" placeholder="目標を記入してください" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">作成</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection