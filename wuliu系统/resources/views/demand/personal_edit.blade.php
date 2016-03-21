@extends('common.page')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('static/css/supply_type_edit.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('static/css/left_info.css') }}">
@stop

@section('js')
    <script type="text/javascript" src="{{asset('static/lib/laydate/laydate.js')}}"></script>
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
                        <div class="instruct-name">发布人员需求信息</div>
                        <div class="instruct-detail">登录后，请填写以下信息，提交人员需求信息，审核后即可发布</div>  
                    </div>
                    <a href=""><div class="ask-help">发布帮助</div></a>
                    <a href="{{ url('demand/page/personal') }}"><div class="require-list">人员需求列表</div></a>
                </div>
                <div class="apply-detail">
                    <div class="error">{{ $errors->first() }}</div>
                    <form name="messageform" action="" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <table cellpadding="0" cellspacing="0" class="onerent">
                            <tbody>
                                <tr>
                                    <td class="tdname" valign="top"><a>*&nbsp;&nbsp;</a>标题：</td>
                                    <td >
                                        <input class="inp" type="text" name="title" value="{{ $demand->demand->title or old('title') }}"/>
                                    </td> 
                                </tr>
                                <tr>
                                    <td class="tdname" valign="top"><a>*&nbsp;&nbsp;</a>职业类型：</td>
                                    <td>
                                        <?php
                                            $class = isset($demand->class)? $demand->class: old('class');
                                        ?>
                                        <select class="sel" name="class">
                                            <option value="">选择职业类别：</option>
                                            @foreach(config('data')['personal']['class'] as $v)
                                                <option @if($class == $v) selected="selected" @endif value="{{ $v }}">{{ $v }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tdname" valign="top"><a>*&nbsp;&nbsp;</a>姓名：</td>
                                    <td >
                                        <input style="width:137px; height: 28px;" type="text" name="name" value="{{ $demand->name or old('name')}}" />&nbsp;&nbsp;
                                        <a>*&nbsp;&nbsp;</a>性别：
                                        <?php
                                            $sex = isset($demand->sex)? $demand->sex: old('sex');
                                        ?>
                                        <select style="width:140px; height: 28px;" type="text" name="sex" >
                                            <option value="">请选择</option>
                                            @foreach(config('data')['personal']['sex'] as $v)
                                                <option @if($sex == $v) selected="selected" @endif value="{{ $v }}">{{ $v }}</option>
                                            @endforeach
                                        </select>
                                    </td> 
                                </tr>    
                                <tr>
                                    <td class="tdname" valign="top"><a>*&nbsp;&nbsp;</a>出生年月：</td>
                                    <td >
                                        <input class="inp" type="text" name="birth_day" value="{{ $demand->birth_day or old('birth_day') }}" onclick="laydate({istime: false, format: 'YYYY年MM月'})" />
                                    </td> 
                                </tr>
                                <tr>
                                    <td class="tdname" valign="top"><a>*&nbsp;&nbsp;</a>工作年限：</td>
                                    <td >
                                        <?php
                                            $working_age = isset($demand->working_age)? $demand->working_age: old('working_age');
                                        ?>
                                        <select class="sel" name="working_age">
                                            <option value="">请选择：</option>
                                            @foreach(config('data')['personal']['working_age'] as $v)
                                                <option @if($working_age == $v) selected="selected" @endif value="{{ $v }}">{{ $v }}</option>
                                            @endforeach
                                        </select>
                                    </td> 
                                </tr> 
                                <tr>
                                    <td class="tdname" valign="top"><a>*&nbsp;&nbsp;</a>上岗时间：</td>
                                    <td><input class="inp" type="text" name="working_time" value="{{ $supply->working_time or old('working_time') }}" onclick="laydate({istime: false, format: 'YYYY-MM-DD'})" /></td>
                                </tr> 
                                <tr>
                                    <td class="tdname" valign="top"><a>*&nbsp;&nbsp;</a>学历：</td>
                                    <td>
                                        <?php
                                            $education = isset($demand->education)? $demand->education: old('education');
                                        ?>
                                        <select class="sel" name="education">
                                            <option value="">请选择：</option>
                                            @foreach(config('data')['personal']['education'] as $v)
                                                <option @if($education == $v) selected="selected" @endif value="{{ $v }}">{{ $v }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr> 
                                <tr>
                                    <td class="tdname" valign="top">期望区域：</td>
                                    <td >
                                        <?php
                                            $zone = isset($demand->zone) ? $demand->zone : old('zone');
                                            ?>
                                        <select class="sel" name="zone">
                                            <option value="">区域</option>
                                            @foreach(config('data')['zone'] as $v)
                                                <option @if($zone == $v) selected="selected" @endif value="{{ $v }}">{{ $v }}</option>
                                            @endforeach
                                        </select>
                                    </td> 
                                </tr> 
                                <tr>
                                    <td class="tdname" valign="top"><a>*&nbsp;&nbsp;</a>期望月薪：</td>
                                    <td >
                                        <input class="price-num" type="number" name="price" value="{{ $demand->price or old('price') }}" />
                                        <?php
                                            $price_type = isset($demand->price_type) ? $demand->price_type : old('price_type');
                                            ?>
                                        <select class="price-type" name="price_type">
                                            @foreach(config('data')['personal']['price_type'] as $v)
                                                <option @if($price_type == $v) selected="selected" @endif value="{{ $v }}">{{ $v }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr> 
                                <tr>
                                    <td class="tdname" valign="top">期望福利：</td>
                                    <td >
                                        <?php
                                            $benefits = (isset($demand->benefits)) ? $demand->benefits : old('benefits');
                                            ?>
                                        @foreach(config('data')['personal']['benefits'] as $v)
                                            <input @if(in_array($v,(array)$benefits)) checked="checked" @endif class="check" type="checkbox" name="benefits[]" value="{{ $v }}" /> {{ $v }}
                                        @endforeach
                                    </td> 
                                </tr> 
                                <tr>
                                    <td class="tdname" valign="top"><a>*&nbsp;&nbsp;</a>手机/电话：</td>
                                    <td >
                                        <input class="inp" type="text" name="phone" value="{{ $demand->phone or old('phone') }}" />
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