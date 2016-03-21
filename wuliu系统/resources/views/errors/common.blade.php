@extends('common.page')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('static/css/user_login.css') }}">
@endsection

@section('nav')
    <div class="nav-search"><a href="{{ Url('user/login') }}">错误信息</a></div>
@endsection

@section('content')
    <div class="mainbody">
        <div class="container">
            <div class="user-page">
                <div class="information-table">
                    <div class="error">{{ $errors->first() }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection