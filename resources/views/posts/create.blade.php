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
                    <label>TASK</label>
                    <input type="text" class="form-control" placeholder="タスクを入力してね" name="name" required>
                </div>
                <div class="form-group">
                    <label>詳細</label>
                    <textarea class="form-control" placeholder="具体的な方法を記入しよう" rows="5" maxlength="140" name="description" required></textarea>
                    {{-- @if ($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                    @endif --}}
                </div>

                <div class="form-group">
                    <label for="type">タスクの種類</label>
                    <select name="type" id="type" class="form-control" required>
                        <option value="" selected style="color: gray;"> タスクの種類を選んでください </option>
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

                <a href="{{ route('posts.index') }}" class="btn btn-primary back-button button-design">戻る</a>
                <button type="submit" class="btn btn-primary create-button button-design">作成</button>

            </form>
        </div>
    </div>
</div>

<script>
    //タスク種類選択の文字を灰色にするJS
    document.addEventListener('DOMContentLoaded', function() {
        const selectElement = document.getElementById('type');
        selectElement.style.color = 'gray'; // Set initial color for placeholder option
    
        selectElement.addEventListener('change', function() {
            // Change color to black or your desired color when a different option is selected
            if (this.value === '') {
                this.style.color = 'gray'; // Keep gray color for default option
            } else {
                this.style.color = 'black'; // Change to black or another color for selected options
            }
        });
    });
</script>

@endsection