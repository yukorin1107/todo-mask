@extends('layouts.app')
<head>
    <link rel="stylesheet" href="{{ asset('css/posts.create.css') }}">
</head>
@section('content')
    
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>タイトル</label>
                    <input type="text" class="form-control" placeholder="タイトルを入力して下さい" name="name" required>
                </div>
                <div class="form-group">
                    <label>内容</label>
                    <textarea class="form-control" placeholder="内容" rows="5" maxlength="140" name="description" required>
                    </textarea>
                    {{-- @if ($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                    @endif --}}
                </div>

                <div class="form-group">
                    <label for="type">タスクの種類</label>
                    <select name="type" id="type" class="form-control" required>
                        <option value="" disabled selected>タスクの種類を選んでください</option>
                        <option value="Reading">Reading</option>
                        <option value="Listening">Listening</option>
                        <option value="Speaking">Speaking</option>
                        <option value="Writing">Writing</option>
                        <option value="Vocabulary">Vocabulary</option>
                    </select>
                </div> 

                <div class="form-group">
                    <label for="image">画像登録</label>
                    <input type="file" class="form-control-file" name='image' id='image'>
                </div>               

                <button type="submit" class="btn btn-primary">作成</button>
                <a href="{{ route('posts.index') }}" class="btn btn-primary back-button">戻る</a>

            </form>
        </div>
    </div>
</div>
@endsection