@extends('layouts.app')
@section('content')
    
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>タイトル</label>
                    <input type="text" class="form-control" placeholder="タイトルを入力して下さい" name="name">
                </div>
                <div class="form-group">
                    <label>内容</label>
                    <textarea class="form-control" placeholder="内容" rows="5" maxlength="140" name="description">
                    </textarea>
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
@endsection