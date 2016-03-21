@extends('common.page')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('static/css/supply_type_edit.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('static/css/left_info.css') }}">
@stop

@section('nav')
    <div class="nav-search"><a href="">信息发布</a></div>
@endsection

@section('content')
    <div class="mainbody">
        <div class="container">
            @include('include.left_info_create')
            
            <div class="right">
                <div class="apply">
                    <div class="instruct">
                        <div class="instruct-name">发布仓库需求信息</div>
                        <div class="instruct-detail">登录后，请填写以下信息，提交仓库需求信息，审核后即可发布</div>  
                    </div>
                    <a href=""><div class="ask-help">发布帮助</div></a>
                    <a href="{{ url('demand/page/warehouse') }}"><div class="require-list">仓库需求列表</div></a>
                </div>
                <div class="apply-detail">
                    <div class="error">{{ $errors->first() }}</div>
                    <form name="messageform" action="" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <table cellpadding="0" cellspacing="0" class="onerent">
                            <tbody>
                                <tr>
                                    <td class="tdname" valign="top"><a>*&nbsp;&nbsp;</a>标题：</td>
                                    <td >
                                        <input class="inp" type="text" name="title" value="{{ $demand->demand->title or old('title')}}" />
                                    </td> 
                                </tr> 
                                <tr>
                                    <td class="tdname" valign="top">期望区域：</td>
                                    <td >
                                        <?php
                                            $zone = isset($demand->zone) ? $demand->zone : old('zone');
                                            ?>
                                        <select class="sel" name="zone">
                                            <option value="">请选择期望区域：</option>
                                            @foreach(config('data')['zone'] as $v)
                                                <option @if($zone == $v) selected="selected" @endif value="{{ $v }}">{{ $v }}</option>
                                            @endforeach
                                        </select>
                                    </td> 
                                </tr>    
                                <tr>
                                    <td class="tdname" valign="top"><a>*&nbsp;&nbsp;</a>期望位置：</td>
                                <td >
                                    <input class="position" type="text" name="address" value="{{ $demand->address or old('address') }}" />临近
                                    <input class="position" type="text" name="near" value="{{ $demand->near or old('near') }}" />
                                </td> 
                                </tr>
                                <tr>
                                    <td class="tdname" valign="top"><a>*&nbsp;&nbsp;</a>期望类型：</td>
                                    <td >
                                        <?php
                                            $class = isset($demand->class) ? $demand->class : old('class');
                                        ?>
                                        <select class="sel" name="class">
                                            <option value="">请选择仓库类型：</option>
                                            @foreach(config('data')['warehouse']['class'] as $v)
                                                <option @if($class == $v) selected="selected" @endif value="{{ $v }}">{{ $v }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr> 
                                <tr>
                                    <td class="tdname" valign="top"><a>*&nbsp;&nbsp;</a>期望面积：</td>
                                    <td >
                                        <input class="inp" type="number" name="acreage" value="{{ $demand->acreage or old('acreage') }}" />&nbsp;&nbsp;平米</td>
                                </tr>
                                <tr>
                                    <td class="tdname" valign="top"><a>*&nbsp;&nbsp;</a>期望价格：</td>
                                    <td >
                                        <input class="price-num" type="number" name="price" value="{{ $demand->price or old('price') }}" />
                                        <?php
                                            $price_type = isset($demand->price_type) ? $demand->price_type : old('price_type');
                                            ?>
                                        <select class="price-type" name="price_type">
                                            @foreach(config('data')['warehouse']['price_type'] as $v)
                                                <option @if($price_type == $v) selected="selected" @endif value="{{ $v }}">{{ $v }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr> 
                                <tr>
                                    <td class="tdname" valign="top"><a>*&nbsp;&nbsp;</a>手机/电话：</td>
                                    <td >
                                        <input class="inp" type="text" name="phone" value="{{ $demand->phone or old('phone') }}" />
                                    </td> 
                                </tr> 
                                <tr>
                                    <td class="tdname" valign="top"><a>*&nbsp;&nbsp;</a>联系人：</td>
                                    <td >
                                        <input class="inp" type="text" name="contacts" value="{{ $demand->contacts or old('contacts') }}"/>
                                    </td>  
                                </tr>  
                                <tr>
                                    <td class="tdname" valign="top">补充说明：</td>
                                    <td >
                                        <textarea  class="describe" type="text" name="desc">{{ $demand->demand->desc or old('desc') }}</textarea>
                                    </td> 
                                </tr>    
                                <tr >
                                    <td class="clickandsubmit"></td>
                                    <td class="cas">
                                        <input class="sub" type="checkbox" name="agree" value="1" />&nbsp;&nbsp;我已阅读并同意<a href="">《仓库需求相关条款》</a>
                                        <input class="submit" type="submit" value="马上发布" />
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop