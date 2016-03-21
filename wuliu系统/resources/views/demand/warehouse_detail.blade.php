@extends('common.page')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('static/css/supply_warehouse_detail.css') }}">
@stop

@section('nav')
    <div class="nav-search"><a href="{{ Url('demand/page/warehouse') }}">信息列表</a></div>
    <div class="nav-search"><a href="#">仓库供应信息列</a></div>
@endsection

@section('content')
	<div class="detail-body">
        <div class="container">
            <div class="detail-message">
                <div class="page-front">
                    <div class="page-title">{{ $demand->demand->title }}</div>
                    <div class="page-watch">浏览{{ $demand->demand->view_times }}次</div>
                    <div class="page-time">{{ $demand->demand->created_at->toDateString() }}</div>
                </div>
                <div class="page-pic" style="background-image: url('{{ asset($demand->demand->firstImage) }}')"></div>
                <div class="price-message">
                    <div class="detail"> {{ $demand->price }}</div>
                    <div class="detail-type">{{ $demand->price_type}}</div>
                    <div class="detail">{{ $demand->acreage }}</div>
                    <div class="detail-type">m<sup>2</sup></div>
                    <div class="claim">可分割</div>
                    <a href="#"><div class="cooperation-intention">发送合作意向</div></a>
                </div>
                <div class="page-options">
                    <div class="select">仓库描述</div>
                    <div>仓库图片</div>
                    <div>供应发布者信息</div>
                    <div>相似供应信息</div>
                </div>
            </div>
            <div class="message-list">
                <div class="control-message">
                    <div><a href="{{ url('demand/edit/' . $demand->id) }}">编辑信息</a></div>
                    <div><a href="{{ url('demand/cancel/' . $demand->id) }}">取消供应</a></div>
                    <div><a href="{{ url('demand/close/' . $demand->id) }}">关闭供应</a></div>
                </div>
                <div class="detail-dynamic">
                    <div class="leave-message">
                        <div class="dmessage">动态信息</div>
                        <a href="#"><div class="imessage">我要留言</div></a>
                    </div>
                    @foreach($demand->demand->messages as $message)
                        <div class="comments">
                            <div class="people">{{ $message->user->nickname }}</div>
                            <div class="watch-message">{{ $message->content }}</div>
                            <div class="comments-time">{{ $message->created_at->format('Y-m-d H:i') }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@stop