@extends('common.page')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('static/css/user_cooperation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('static/css/left_user.css') }}">
@stop

@section('nav')
    <div class="nav-search"><a href="{{ Url('cooperation/page/recv') }}">我的消息</a></div>
    <div class="nav-search">收到的而合作意向</div>
@endsection

@section('content')
    <div class="mainbody">
        <div class="container">
            @include('include/left_user')

            <div class="right">
                <div class="firstpart">
                    <div class="instruct">
                        <div class="instruct-name">收到的合作意向</div>
                        <div class="instruct-detail">共有 <a>{{ $coops->total() }}</a> 条信息</div>
                    </div>
                </div>
                <div class="secondpart">
                    @foreach($coops as $coop)
                        <div class="message-released">
                            <div class="rent-ask">
                                @if ($coop->read == 0)<div class="unread"></div> @endif
                                <div class="rent-detail">{{ $coop->content }}，联系人：{{ $coop->contacts }}，电话：{{ $coop->phone }}</div>
                                <div class="time">{{ $coop->created_at->format('Y-m-d H:i') }}</div>
                            </div>
                            <div class="message-head">
                                <div class="my-message">我发布的{{ $coop->res->type->name }}信息：</div>
                                <div class="title"><a href="{{ url($coop->type . '/' . $coop->res->id) }}" target="_blank">{{ $coop->res->title }}</a></div>
                                <div class="status-{{ $coop->res->stage }}">{{ $coop->res->stage_name }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="page">
                    {{ $coops->render() }}
                </div>
            </div>
        </div>
    </div>
@stop
