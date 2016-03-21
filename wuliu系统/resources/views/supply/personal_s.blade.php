@extends('common.page')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('static/css/supply_warehouse_s.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('static/css/search_opt.css') }}">
@stop

@section('nav')
	<div class="nav-search"><a href="{{ Url('supply/page/warehouse') }}">人员供应信息</a></div>
	<div class="nav-search"><a href="#">搜索</a></div>
@endsection

@section('content')
	<div class="container">
		<div class="supply-demand">
			<div class="select"><a href="{{ url('supply/s/personal') }}">全部人员供应</a></div>
				<div><a href="{{ url('demand/s/personal') }}">全部人员需求</a></div>
			</div>
			<div class="search-opt">
				<div class="the-options">
			        <div class="one-opt">
						<div class="opt-name">区域：</div>
						<ul class="districtoption">
							<li @if(empty(request('zone'))) class="select" @endif><a href="{{ \App\Lib\Common\Url::del('zone') }}">不限</a></li>
								@foreach(config('data')['zone'] as $zone)
									<li @if(request('zone') == $zone) class="select" @endif><a href="{{ \App\Lib\Common\Url::append('zone', $zone) }}">{{ $zone }}</a></li>
								@endforeach
							</ul>
				        </div>
				        <div class="one-opt">
                            <div class="opt-name">学历：</div>
                            <ul class="priceoption">
                                <li @if(empty(request('education'))) class="select" @endif><a href="{{ \App\Lib\Common\Url::del('education') }}">不限</a></li>
                                @foreach(config('data')['personal']['education'] as $education)
                                <li @if(request('education') == $education) class="select" @endif><a href="{{ \App\Lib\Common\Url::append('education', $education) }}">{{ $education }}</a></li>
                                @endforeach
                            </ul>
                        </div>
				        <div class="one-opt">
							<div class="opt-name">类型：</div>
							<?php

							?>
							<ul class="typeoption">
								<li @if(empty(request('class'))) class="select" @endif><a href="{{ \App\Lib\Common\Url::del('class') }}">不限</a></li>
								@foreach(config('data')['personal']['class'] as $class)
									<li @if(request('class') == $class) class="select" @endif><a href="{{ \App\Lib\Common\Url::append('class', $class) }}">{{ $class }}</a></li>
								@endforeach
							</ul>
				        </div>
				    </div>
					<div class="hardware">
						<div class="ano-opt">
							<div class="opt-name">排序</div>
								<ul class="default">
									<li @if(empty(request('orderBy'))) class="select" @endif><a href="{{ \App\Lib\Common\Url::del('orderBy') }}">默认</a></li>
									<li @if(request('orderBy') == 'created_at-desc') class="select" @endif><a href="{{ \App\Lib\Common\Url::append('orderBy', 'created_at-desc') }}">最新</a></li>
									@if(request('orderBy') == 'price-asc')
										<li class="select select-asc"><a href="{{ \App\Lib\Common\Url::append('orderBy', 'price-desc') }}">薪资</a></li>
									@elseif(request('orderBy') == 'price-desc')
										<li class="select select-desc"><a href="{{ \App\Lib\Common\Url::append('orderBy', 'price-asc') }}">薪资</a></li>
									@else
										<li><a href="{{ \App\Lib\Common\Url::append('orderBy', 'price-asc') }}">薪资</a></li>
									@endif
							</ul>
						</div>
					</div>
				</div>
				<div class="goods-list">
					<table cellpadding="0" cellspacing="0" class="personal-list" width="90%">
		                <tbody>
		                    @foreach($supplies as $supply)
		                    <tr class="personal-one">
		                        <td class="personal-title" width="40%"><a href="{{ url("supply/{$supply->supply->id}") }}">{!! str_replace(request('title'), '<font color="red">' . request('title') . '</font>', htmlspecialchars($supply->supply->title)) !!}&nbsp;&nbsp;(
                                        @foreach((array) $supply->benefits as $v)
                                        <a>{{ $v }}</a>
                                        @endforeach
                                        )</a></a></td>
		                        <td class="personal-company">{{ $supply->company }}</td>
		                        <td class="personal-location" width="60">{{ $supply->zone }}</td>
		                        <td class="personal-data" width="100">{{ $supply->supply->created_at->format('Y-m-d H:i') }}</td>
		                        <td class="personal-price" width="100">{{ $supply->price }} {{ $supply->price_type }}</td>
		                    </tr>
		                    @endforeach
		                </tbody>
		            </table>
		            </div>
			<div class="page">
				{{ $supplies->appends($query)->render() }}
			</div>
		</div>
	</div>
@stop