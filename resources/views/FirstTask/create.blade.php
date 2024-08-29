@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/firsttask.create.css') }}">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div id="step2-parent">
                <div id="step2">
                    <p id="step2-inst"> STEP2: 最初のタスク入力 </p>
                    <p id="step2-description">{{ Auth::user()->name }}さんの最初のタスクを <br> 例に沿って打ち込んでみよう</p>
                </div>
            </div>
            <form action="{{ route('FirstTask.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>TASK</label>
                    <input type="text" class="form-control" placeholder="例）英語の本を読む" name="name">
                </div>
                <div class="form-group">
                    <label>詳細</label>
                    <textarea class="form-control" placeholder="例）最低50ページ読む" rows="5" maxlength="140" name="description"></textarea>
                </div>
                <div class="form-group">
                    <label for="type">タスクの種類</label>
                    <select name="type" id="type" class="form-control" required>
                        <option value="" selected style="color: gray;">タスクの種類を選んでください</option>
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

