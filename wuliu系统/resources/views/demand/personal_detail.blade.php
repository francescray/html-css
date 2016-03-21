@extends('common.page')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('static/css/supply_warehouse_detail.css') }}">
@stop

@section('nav')
    <div class="nav-search"><a href="{{ Url('demand/page/warehouse') }}">信息列表</a></div>
    <div class="nav-search"><a href="#">人员需求信息列</a></div>
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
	                <div class="company-title">{{ $demand->class }}</div>
				    <div class="company-type"></div>
	                <form name="messageform" action="" >
	                    <table cellpadding="0" cellspacing="0" class="companypersonal-message">
	                        <tbody>
				                <tr>
				                	<td class="company-label">工作地址：</td>
                                    <td class="company-address">{{ $demand->zone }}<!--<a class="companymap">查看地图</a>--></td>
				                </tr>
				                <tr>
				                	<td class="company-label">性别：</td>
                                    <td class="company-address">{{ $demand->sex }}
				                </tr>
				                <tr>
				                	<td class="company-label">出生年月：</td>
                                    <td class="company-address">{{ $demand->birth_day }}
				                </tr>
	                            <tr>
				                	<td class="company-label">期望薪资：</td>
                                    <td class="company-money">{{ $demand->price }} {{ $demand->price_type }}</td>
				                </tr>
				                <tr>
				                	<td class="company-label">学历：</td>
                                    <td>{{ $demand->education }}</td>
				                </tr>
				                <tr>
				                	<td class="company-label">招聘职位：</td>
                                    <td>{{ $demand->job }}（招 {{ $demand->num }} 人）</td>
				                </tr>
				                <tr>
				                	<td class="company-label">工作年限：</td>
                                    <td>{{ $demand->working_age }}</td>
				                </tr>
                                <tr>
                                    <td class="company-label">上岗时间：</td>
                                    <td>{{ $demand->working_time }}</td>
                                </tr>
				                <tr>
				                	<td class="company-label">期望福利：</td><td class="company-pay">
				                		<ul>
                                            @foreach((array) $demand->benefits as $v)
				                			<li>{{ $v }}</li>
                                            @endforeach
				                		</ul>
				                	</td>
				                </tr>
				                <tr>
				                	<td class="company-label">联系电话：</td>
                                    <td class="company-phone">{{ $demand->phone }}<!--<a href="">[查看]</a>--></td>
				                </tr>
				                <tr>
				                	<td class="company-label">联系人：</td>
                                    <td class="company-phone">{{ $demand->name }}<!--<a href="">[查看]</a>--></td>
				                </tr>
	                        </tbody>
	                    </table>
	                </form>
	                <a href="#"><div class="company-intention cooperation-intention">发送合作意向</div></a>
                </div>
                <div class="page-options">
                    <div class="select">需求描述</div>
                    <div>职位介绍</div>
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
