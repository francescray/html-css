@extends('common.page')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('static/css/supply_warehouse_detail.css') }}">
@stop

@section('nav')
    <div class="nav-search"><a href="{{ Url('demand/page/warehouse') }}">信息列表</a></div>
    <div class="nav-search"><a href="#">车辆需求信息列</a></div>
@endsection

@section('content')
	<div class="detail-body">
        <div class="container">
            <div class="detail-message">
                <div class="page-front">
                    <div class="page-title">{{ $demand->demand->title }}</div>
                    <div class="page-watch">浏览{{ $demand->demand->view_times }}次</div>
                    <div class="page-time"></div>
                    <div class="page-update">发布：{{ $demand->demand->created_at->format('Y-m-d') }}</div>
                </div>
                <div class="page-detail">
	                <div class="company-title">租车时间 &nbsp;&nbsp;从{{ $demand->from }} &nbsp;&nbsp;到 {{ $demand->to }}</div>
				    <div class="company-type"><!--行业：sSs/dad+其他行业--></div>
	                <form name="messageform" action="" >
	                    <table cellpadding="0" cellspacing="0" class="companypersonal-message">
	                        <tbody>
	                            <tr>
				                	<td class="company-label">租车费用：</td>
                                    <td class="company-money">{{ $demand->price }} {{ $demand->price_type }}</td>
				                </tr>
				                <tr>
				                	<td class="company-label">车辆类型：</td>
                                    <td>{{ $demand->class }}</td>
				                </tr>
				                <tr>
				                	<td class="company-label">车辆用途：</td>
                                    <td>{{ $demand->use }}</td>
				                </tr>
				                <tr>
				                	<td class="company-label">司机情况：</td>
                                    <td>{{ $demand->driver }}</td>
				                </tr>
				                <tr>
				                	<td class="company-label">目的地：</td>
                                    <td class="company-address">{{ $demand->zone }}<!--<a class="companymap">查看地图</a>--></td>
				                </tr>
				                <tr>
				                	<td class="company-label">联系电话：</td>
                                    <td class="company-phone">{{ $demand->phone }}<!--<a href="">[查看]</a>--></td>
				                </tr>
				                <tr>
				                	<td class="company-label">联系人：</td>
                                    <td>{{ $demand->contacts }}</td>
				                </tr>
				                <tr>
				                	<td class="company-label">补充说明：</td>
                                    <td class="company-address">{{ $demand->demand->desc }}</td>
				                </tr>
	                        </tbody>
	                    </table>
	                </form>
	                <a href="#"><div class="company-intention cooperation-intention">发送合作意向</div></a>
                </div>
                <div class="page-options">
                    <div class="select">需求描述</div>
                    <div>详细需求信息</div>
                    <div>需求发布者信息</div>
                    <div>相似需求信息</div>
                </div>
            </div>
            <div class="message-list">
                <div class="control-message">
                    <div><a href="{{ url('demand/edit/' . $demand->demand->id) }}">编辑信息</a></div>
                    <div><a href="{{ url('demand/cancel/' . $demand->demand->id) }}">取消供应</a></div>
                    <div><a href="{{ url('demand/close/' . $demand->demand->id) }}">关闭供应</a></div>
                </div>
                <div class="detail-dynamic">
                    <div class="leave-message">
                        <div class="dmessage">动态信息</div>
                        <a href="#"><div class="imessage">我要留言</div></a>
                    </div>
                    <div class="comments">
                        <div class="people"></div>
                        <div class="watch-message"></div>
                        <div class="comments-time"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
