@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/firsttask.laststep.css') }}">

<div id="parent">
    <div id="step3-parent">
        <div id="step3">
            <p id="step3-inst"> STEP3: <br> ENGLISH TASKを開始 </p>
            <p id="step3-description">早速すべての機能を使ってみよう</p>
        </div>
    </div>
    <div>
        <a href="{{ route('posts.index') }}" class="btn btn-primary my-button">
            はじめる
        </a>
    </div>
</div>


@endsection