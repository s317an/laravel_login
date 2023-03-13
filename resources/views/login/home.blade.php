@extends('layout')
@section('title','ホーム画面')
@section('content')
<div class="collapse" id="navbarToggleExternalContent">
    <div class="bg-dark p-4">
        <h6 class="text-white h1">ホームページ</h6>
        <span class="text-muted">
            <h5>プロフィール</h5>
            <ul>
                <li>名前:{{Auth::user()->name}}</li>
                <li>メールアドレス:{{Auth::user()->email}}</li>
            </ul>
        </span>
    </div>
</div>
<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<x-alert type="success" :session="session('success')"/>

<br>
<br>
<br>

<form action="{{route('logout')}}" method="post">
    @csrf
    <button class="btn btn-outline-danger">ログアウト</button>
</form>
@endsection