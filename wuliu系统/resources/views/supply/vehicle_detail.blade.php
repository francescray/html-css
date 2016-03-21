@extends('common.page')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('static/css/supply_warehouse_detail.css') }}">
@stop

@section('nav')
    <div class="nav-search"><a href="{{ Url('supply/page/warehouse') }}">信息列表</a></div>
    <div class="nav-search"><a href="#">车辆供应信息列</a></div>
@endsection

@section('content')
	<div class="detail-body">
        <div class="container">
            <div class="detail-message">
                <div class="page-front">
                    <div class="page-title">{{ $supply->supply->title }}</div>
                    <div class="page-watch">浏览{{ $supply->supply->view_times }}次</div>
                    <div class="page-time">{{ $supply->supply->created_at->toDateString() }}</div>
                </div>
                <div class="page-pic" style="background-image: url('{{ asset ($supply->supply->firstImage)  }}')"></div>
                <div class="price-message">
                    <div class="detail"> {{ $supply->price }}</div>
                    <div class="detail-type">{{ $supply->price_type }}</div>
                    <div class="detail">{{ $supply->class }}</div>
                    <div class="load">（{{$supply->load}}{{$supply->load_type}}以上）</div>
                    <div class="cooperation-intention" data-id="{{ $supply->supply->id }}">发送合作意向</div>
                </div>
                <div class="page-options">
                    <div class="select">车辆描述</div>
                    <div>车辆图片</div>
                    <div>供应发布者信息</div>
                    <div>相似供应信息</div>
                </div>
            </div>
            <div class="message-list">
                <div class="control-message">
                    <div><a href="{{ url('supply/edit/' . $supply->supply->id) }}">编辑信息</a></div>
                    <div><a href="{{ url('supply/cancel/' . $supply->supply->id) }}">取消供应</a></div>
                    <div><a href="{{ url('supply/close/' . $supply->supply->id) }}">关闭供应</a></div>
                </div>
                <div class="detail-dynamic">
                    <div class="leave-message">
                        <div class="dmessage">动态信息</div>
                        <a href="#"><div class="imessage">我要留言</div></a>
                    </div>
                    @foreach($supply->supply->messages as $message)
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