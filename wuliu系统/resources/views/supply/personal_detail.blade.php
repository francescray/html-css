@extends('common.page')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('static/css/supply_warehouse_detail.css') }}">
@stop

@section('nav')
    <div class="nav-search"><a href="{{ Url('supply/page/warehouse') }}">信息列表</a></div>
    <div class="nav-search"><a href="#">人员供应信息列</a></div>
@endsection

@section('content')
	<div class="detail-body">
        <div class="container">
            <div class="detail-message">
                <div class="page-front">
                    <div class="page-title">{{ $supply->supply->title }}</div>
                    <div class="page-watch">浏览{{ $supply->supply->view_times }}次</div>
                    <div class="page-time"></div>
                    <div class="page-update">发布：{{ $supply->supply->created_at->format('Y-m-d') }}</div>
                </div>
                <div class="page-detail">
	                <div class="company-title">{{ $supply->company }}</div>
				    <div class="company-type">{{ $supply->class }}</div>
	                <form name="messageform" action="" >
	                    <table cellpadding="0" cellspacing="0" class="companypersonal-message">
	                        <tbody>
	                            <tr>
				                	<td class="company-label">薪资待遇：</td>
                                    <td class="company-money">{{ $supply->price }} {{ $supply->price_type }}</td>
				                </tr>
				                <tr>
				                	<td class="company-label">学历要求：</td>
                                    <td>{{ $supply->education }}</td>
				                </tr>
				                <tr>
				                	<td class="company-label">招聘职位：</td>
                                    <td>{{ $supply->job }}（招 {{ $supply->num }} 人）</td>
				                </tr>
				                <tr>
				                	<td class="company-label">工作年限：</td>
                                    <td>{{ $supply->working_age }}</td>
				                </tr>
                                <tr>
                                    <td class="company-label">上岗时间：</td>
                                    <td>{{ $supply->working_time }}</td>
                                </tr>
				                <tr>
				                	<td class="company-label">工作地址：</td>
                                    <td class="company-address">{{ $supply->address }} （{{ $supply->zone }}）<!--<a class="companymap">查看地图</a>--></td>
				                </tr>
				                <tr>
				                	<td class="company-label">福利待遇：</td><td class="company-pay">
				                		<ul>
                                            @foreach((array) $supply->benefits as $v)
				                			<li>{{ $v }}</li>
                                            @endforeach
				                		</ul>
				                	</td>
				                </tr>
				                <tr>
				                	<td class="company-label">联系电话：</td>
                                    <td class="company-phone">{{ $supply->phone }}<!--<a href="">[查看]</a>--></td>
				                </tr>
	                        </tbody>
	                    </table>
	                </form>
                    <div class="cooperation-intention company-intention" data-id="{{ $supply->supply->id }}">发送合作意向</div>
                </div>
                <div class="page-options">
                    <div class="select">职位描述</div>
                    <div>公司介绍</div>
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
