@extends('common.page')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('static/css/supply_warehouse_s.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('static/css/search_opt.css') }}">
@stop

@section('nav')
	<div class="nav-search"><a href="{{ Url('demand/page/warehouse') }}">仓库需求信息</a></div>
	<div class="nav-search"><a href="#">搜索</a></div>
@endsection

@section('content')
	<div class="container">
		<div class="supply-demand">
			<div><a href="{{ url('supply/s/warehouse') }}">全部仓库供应</a></div>
			<div class="select"><a href="{{ url('demand/s/warehouse') }}">全部仓库需求</a></div>
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
						@foreach(config('data')['warehouse']['price'] as $price)
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
						@foreach(config('data')['warehouse']['class'] as $class)
							<li @if(request('class') == $class) class="select" @endif><a href="{{ \App\Lib\Common\Url::append('class', $class) }}">{{ $class }}</a></li>
						@endforeach
					</ul>
		        </div>
		    </div>
			<div class="hardware">
				<!--<div class="ano-opt">
					<div class="opt-name">筛选</div>
					<select class="direction">
						<option value=""><a href="">朝向</a></option>
						<option value="朝东"><a href="">朝东</a></option>
						<option value="朝西"><a href="">朝西</a></option>
						<option value="朝南"><a href="">朝南</a></option>
						<option value="朝北"><a href="">朝北</a></option>
					</select>
					<select class="buildage">
						<option value=""><a href="">楼龄</a></option>
						<option value="5"><a href="">5年内</a></option>
						<option value="10"><a href="">5-10年</a></option>
						<option value="15"><a href="">10-15年</a></option>
					</select>
					<select class="buildfloor">
						<option value="swarehouse"><a href="">楼层</a></option>
						<option value="saab"><a href="">Saab</a></option>
						<option value="opel"><a href="">Opel</a></option>
						<option value="audi"><a href="">Audi</a></option>
					</select>
				</div>
				<div class="condition">
					<div class="conditionoption">条件</div>
					<div class="choosed">
						<div><a href="">XX小区</a></div>
						<div><a href="">水产类</a></div>
					</div>
					<div class="clearchoose"><a href="">清空筛选选项</a></div>
					<a href=""><div class="subscription">订阅该条件仓库供应信息</div></a>
				</div>-->
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

						@if(request('orderBy') == 'acreage-asc')
							<li class="select select-asc"><a href="{{ \App\Lib\Common\Url::append('orderBy', 'acreage-desc') }}">面积</a></li>
						@elseif(request('orderBy') == 'acreage-desc')
							<li class="select select-desc"><a href="{{ \App\Lib\Common\Url::append('orderBy', 'acreage-asc') }}">面积</a></li>
						@else
							<li><a href="{{ \App\Lib\Common\Url::append('orderBy', 'acreage-asc') }}">面积</a></li>
						@endif
					</ul>
				</div>
			</div>
		</div>
		<div class="goods-list">
			 @foreach($demands as $demand)
	            <div class="goods-one">
					<a href="{{ url('demand/' . $demand->demand->id) }}"><div class="goods-pic" style="background-image: url('{{ asset('static/img/page-pic.png') }}')"></div></a>
					<div class="goods-detail">
						<div class="first-line">
							<div class="detail-title"><a href="{{ url('demand/' . $demand->demand->id) }}">{!! str_replace(request('title'), '<font color="red">' . request('title') . '</font>', htmlspecialchars($demand->demand->title)) !!}</a></div>
							<div class="detail-loc">{{ $demand->zone }}</div>
						</div>
						<div class="second-line">{{ $demand->desc }}</div>
						<div class="third-line">
							<div class="update-time">仓库/更新时间：</div>
							<div class="time">{{ $demand->demand->created_at->format('Y-m-d H:i') }}</div>
						</div>
					</div>
					<div class="goods-area">
						<div class="price-num">{{ $demand->acreage }}</div>
						<div class="unit">m<sup>2</sup></div>
					</div>
					<div class="goods-price">
						<div class="price-num">{{ $demand->price }}</div>
						<div class="unit">元/m<sup>2</sup>/天</div>
					</div>
				</div>
            @endforeach
			<div class="page">
				{{ $demands->appends($query)->render() }}
			</div>
		</div>

	</div>
@stop