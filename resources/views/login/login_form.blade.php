@extends('layout')
@section('title','ログイン画面')
@section('content')
    <form class="form-signin" action="{{route('login')}}" method="post" >
        @csrf
        <h1 class="h3 mb-3 font-weight-normal">ログイン画面</h1>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <x-alert type="danger" :session="session('danger')"/>


            <label for="inputEmail" class="sr-only">Email</label>
                <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email 入力してください" >
            <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password 入力してください" >
        <button class="btn btn-lg btn-primary btn-block" type="submit">ログイン</button>
        
    </form>
@endsection

