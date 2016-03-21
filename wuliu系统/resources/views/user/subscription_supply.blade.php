
@extends('common.page')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('static/css/user_subscription.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('static/css/left_user.css') }}">
@stop

@section('js')
    <script type="text/javascript" src="{{asset('static/js/select.js')}}"></script>
@stop

@section('content')
    <div class="mainbody">
        <div class="container">
            @include('include/left_user')

            <div class="right">
                <div class="firstpart">
                    <div class="instruct">
                        <div class="instruct-name">订阅的供应信息</div>
                        <div class="instruct-detail">共有<a >166</a>条信息</div>
                    </div>
                </div>
                <div class="secondpart">
                    <div class="message-released">
                        <div class="message-head">
                            <div class="unread"></div>
                            <div class="title"><a href="">昌平仓库出租500m<sup>2</sup>可自由分割</a></div>
                            <div class="status-ing">进行中</div>
                            <div class="time">2015.12.02 &nbsp; 8:00</div>
                        </div>
                        <div class="message-dec">收到<a >16</a>条合作意向</div>
                    </div>
                    <div class="message-released">
                        <div class="message-head">
                            <div class="unread"></div>
                            <div class="title"><a href="">昌平仓库出租500m<sup>2</sup>可自由分割</a></div>
                            <div class="status-cancel">已取消</div>
                            <div class="time">2015.12.02 &nbsp; 8:00</div>
                        </div>
                        <div class="message-dec">收到<a >16</a>条合作意向</div>
                    </div>
                    <div class="message-released">
                        <div class="message-head">
                            <div class="read"></div>
                            <div class="title"><a href="">昌平仓库出租500m<sup>2</sup>可自由分割</a></div>
                            <div class="status-finish">已完成</div>
                            <div class="time">2015.12.02 &nbsp; 8:00</div>
                        </div>
                        <div class="message-dec">收到<a >16</a>条合作意向</div>
                    </div>
                </div>
                <div class="thirdpart">
                    <div class="nextpage">下一页</div>
                    <div class="buttons">
                        <div class="select">1</div>
                        <div>2</div>
                        <div>3</div>
                        <div>4</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop