@extends('common.page')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('static/css/supply_warehouse_page.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('static/css/left_info.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('static/css/search_opt.css') }}">
@stop

@section('nav')
    <div class="nav-search"><a href="{{ Url('supply/page/warehouse') }}">信息列表</a></div>
@endsection

@section('content')
    <div class="mainbody">
        <div class="container">
            @include('include.left_info')

            <div class="right">
                <div class="firstpart">
                    <div class="title">车辆需求信息列表</div>
                    <div class="messagecount">共有<a>{{ $demands->total() }}</a>条信息</div>
                </div>
                <div class="secondpart">
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
                    <table cellpadding="0" cellspacing="0" class="personal-list" width="90%">
                        <tbody>
                            @foreach($demands as $demand)
                            <tr class="personal-one">
                                <td class="personal-title" width="40%"><a href="{{ url("demand/{$demand->demand->id}") }}">{{ $demand->demand->title }}</a></br>租车时间 &nbsp;&nbsp;从{{ $demand->from }} &nbsp;&nbsp;到 {{ $demand->to }}</td>
                                <td class="personal-class">{{ $demand->class }}</td>
                                <td class="personal-company">地区：{{ $demand->zone }}</td>
                                <td class="personal-location" width="60">{{ $demand->use }}</td>
                                <td class="personal-data" width="100">{{ $demand->driver }}</td>
                                <td class="personal-price" width="100">{{ $demand->price }} {{ $demand->price_type }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="page">
                        {{ $demands->appends($query)->render() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop