@extends('common.page')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('static/css/supply_warehouse_s.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('static/css/search_opt.css') }}">
@stop

@section('nav')
	<div class="nav-search"><a href="{{ Url('supply/page/warehouse') }}">车辆供应信息</a></div>
	<div class="nav-search"><a href="#">搜索</a></div>
@endsection

@section('content')
	<div class="container">
		<div class="supply-demand">
			<div class="select"><a href="{{ url('supply/s/vehicle') }}">全部车辆供应</a></div>
			<div><a href="{{ url('demand/s/vehicle') }}">全部车辆需求</a></div>
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
						<div class="opt-name">价格：</div>
						<ul class="priceoption">
							<li @if(empty(request('price'))) class="select" @endif><a href="{{ \App\Lib\Common\Url::del('price') }}">不限</a></li>
							@foreach(config('data')['vehicle']['price'] as $price)
								<li @if(request('price') == $price['value']) class="select" @endif><a href="{{ \App\Lib\Common\Url::append('price', $price['value']) }}">{{ $price['string'] }}</a></li>
							@endforeach
						</ul>
			        </div>
			        <div class="one-opt">
						<div class="opt-name">类型：</div>
						<?php

						?>
						<ul class="typeoption">
							<li @if(empty(request('class'))) class="select" @endif><a href="{{ \App\Lib\Common\Url::del('class') }}">不限</a></li>
							@foreach(config('data')['vehicle']['class'] as $class)
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
								<li class="select select-asc"><a href="{{ \App\Lib\Common\Url::append('orderBy', 'price-desc') }}">价格</a></li>
							@elseif(request('orderBy') == 'price-desc')
								<li class="select select-desc"><a href="{{ \App\Lib\Common\Url::append('orderBy', 'price-asc') }}">价格</a></li>
							@else
								<li><a href="{{ \App\Lib\Common\Url::append('orderBy', 'price-asc') }}">价格</a></li>
							@endif
					</ul>
				</div>
			</div>
		</div>
		<div class="goods-list">
			<div class="goods-inlist">
				<div class="vehicle-list">
	                @foreach($supplies as $supply)
	                <a href="{{ url('supply/' . $supply->supply->id) }}">
	                <div class="vehicle-one">
	                    <div class="vehicle-pic" style="background-image: url('{{ asset($supply->supply->firstImage) }}')"></div>
	                    <div class="vehicle-name">{!! str_replace(request('title'), '<font color="red">' . request('title') . '</font>', htmlspecialchars($supply->supply->title)) !!}</div>
	                    <div class="vehicle-age">{{ $supply->gearbox }}{{ $supply->age }}年车龄</div>
	                    <div class="vehicle-price">费用：&nbsp;&nbsp;&nbsp;{{ $supply->price }}{{ $supply->price_type }}</div>
	                </div></a>
	                @endforeach
	            </div>
            </div>
			<div class="page">
				{{ $supplies->appends($query)->render() }}
			</div>
		</div>

	</div>
@stop