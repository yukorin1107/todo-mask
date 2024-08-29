@extends('layouts.app')
@section('content') 
<link rel="stylesheet" href="{{ asset('css/goal.confirmation.css') }}">

<div id="goal-parent">
    <span class="box-title"><img src="{{  asset('img/mypage/goal.png') }}" alt="">目標の確認</span>
    <div id="goal-setting">
        <p id="goal-description"> 
            -- {{ Auth::user()->name }}さんの目標 --
        </p>
        
        <p id="goal">
            {{ $goal -> goal_body }}
        </p>   
    </div>  
    <p id="compliment">
        素晴らしい目標ですね <br>
        一緒に頑張りましょう!!
    </p>   
</div>

<div id="buttons">
    <div id="edit-button-parent">
        <!-- Button trigger modal -->
        <div id="note-button-parent">
        <button type="button" class="btn btn-primary button-note-design edit-button" data-bs-toggle="modal" data-bs-target="#exampleModalEdit">
            編集する
        </button> 
        </div>
        {{-- <a href="{{ route('goals.edit', $goal->id) }}" class="btn btn-primary edit-button">編集する</a> --}}

        <!-- Modal -->
        <div class="modal fade" id="exampleModalEdit" tabindex="-1" aria-labelledby="exampleModalEditLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">編集中</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    @if (Auth::user()->id === $goal->user_id)
                                        <!-- フォームの開始 -->
                                        <form action="{{ route('goalsprofile.update', $goal->id) }}" method="POST">
                                            @csrf
                                            @method('put')
                        
                                            <div class="form-group">
                                                <label for="goal_body">目標</label>
                                                <input type="text" id="goal_body" name="goal_body" class="form-control" placeholder="目標を記入してください" 
                                                value="{{ old('goal_body', $goal->goal_body) }}"
                                                >
                                                @error('goal_body')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <p id="edit-description"> ※マイページからいつでも変更可能です
                                            </p>
                                            
                                            <div id="update-button-parent">
                                                <button type="submit" class="btn btn-primary update-button">更新</button>    
                                            </div>
                                        </form>
                                    @else
                                        <p>この目標を編集する権限がありません。</p>
                                    @endif


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="next-button-parent">
        <a href="{{ route('FirstTask.create') }}" class="btn btn-primary">次へ</a>
    </div>
</div>



@endsection