@extends('common.page')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('static/css/user_supply.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('static/css/left_user.css') }}">
@stop

@section('nav')
    <div class="nav-search"><a href="#">个人中心</a></div>
@endsection

@section('content')
    <div class="mainbody">
        <div class="container">
            @include('include/left_user')
			
			<div class="right">
                <div class="firstpart">
                    <div class="instruct">
                        <div class="instruct-name">已发布的供应信息</div>
                        <div class="instruct-detail">共有 <a>{{ $supplies->total() }}</a> 条信息</div>
                    </div>
                </div>
                <div class="secondpart">
                    @foreach($supplies as $supply)
                    <div class="message-released">
                        <div class="message-head">
                            <div class="title"><a href="{{ url("/supply/{$supply->id}") }}" target="_blank">{{ $supply->title }}</a></div>
                            <div class="status-{{ $supply->stage }}">{{ $supply->stage_name }}</div>
                            <div class="time">{{ $supply->created_at->format('Y-m-d H:i') }}</div>
                        </div>
                        <div class="message-dec">收到 <a>{{ $supply->coop_num }}</a> 条合作意向</div>
                    </div>
                    @endforeach
                </div>
                <div class="page">
                    {{ $supplies->render() }}
                </div>
            </div>
        </div>
    </div>
@stop