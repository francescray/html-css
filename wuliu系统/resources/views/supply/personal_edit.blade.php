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
                    <!--<div class="home-logo"></div>-->
                    <div class="instruct">
                        <div class="instruct-name">发布人员供应信息</div>
                        <div class="instruct-detail">登录后，请填写以下信息，提交人员供应信息，审核后即可发布</div>
                    </div>
                    <a href=""><div class="ask-help">发布帮助</div></a>
                    <a href="{{ url('demand/page/personal') }}"><div class="require-list">人员供应列表</div></a>
                </div>
                <div class="apply-detail">
                    <div class="error">{{ $errors->first() }}</div>
                    <form name="messageform" action="" method="post">
                        {{ csrf_field() }}
                        <table cellpadding="0" cellspacing="0" class="onerent">
                            <tbody>
                                <tr>
                                    <td class="tdname" valign="top"><a>*&nbsp;&nbsp;</a>标题：</td>
                                    <td >
                                        <input class="inp" type="text" name="title" value="{{ $supply->supply->title or old('title') }}" />
                                    </td> 
                                </tr>
                                <tr>
                                    <td class="tdname" valign="top"><a>*&nbsp;&nbsp;</a>公司名称：</td>
                                    <td >
                                        <input class="inp" type="text" name="company" value="{{ $supply->company or old('company') }}" />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tdname" valign="top"><a>*&nbsp;&nbsp;</a>所在区域：</td>
                                    <td >
                                        <?php
                                            $zone = isset($supply->zone) ? $supply->zone : old('zone');
                                            ?>
                                        <select class="sel" name="zone">
                                            <option value="">请填写所在区域：</option>
                                            @foreach(config('data')['zone'] as $v)
                                                <option @if($zone == $v) selected="selected" @endif value="{{ $v }}">{{ $v }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tdname" valign="top"><a>*&nbsp;&nbsp;</a>详细地址：</td>
                                    <td >
                                        <input class="inp" type="text" name="address" value="{{ $supply->address or old('address') }}" />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tdname" valign="top"><a>*&nbsp;&nbsp;</a>招聘职位：</td>
                                    <td >
                                        <input class="inp" type="text" name="job" value="{{ $supply->job or old('job') }}" />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tdname" valign="top"><a>*&nbsp;&nbsp;</a>职业类型：</td>
                                    <td>
                                        <?php
                                            $class = isset($supply->class) ? $supply->class : old('class');
                                        ?>
                                        <select class="career-type" name="class">
                                            <option value="">选择职业类别：</option>
                                            @foreach(config('data')['personal']['class'] as $v)
                                                <option @if($class == $v) selected="selected" @endif value="{{ $v }}">{{ $v }}</option>
                                            @endforeach
                                        </select>&nbsp;&nbsp;
                                        <a>*&nbsp;&nbsp;</a>人员数量：
                                        <input style="width: 120px; height: 28px;" type="text" name="num" value="{{ $supply->num or old('num') }}" />
                                        &nbsp;&nbsp;人
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tdname" valign="top"><a>*&nbsp;&nbsp;</a>年龄范围：</td>
                                    <td >
                                        <input class="age" type="number" name="age_min" value="{{ $supply->age_min or old('age_min') }}" />
                                        —&nbsp;
                                        <input class="age" type="number" name="age_max" value="{{ $supply->age_max or old('age_max') }}" />&nbsp;&nbsp;岁
                                    </td> 
                                </tr>    
                                <tr>
                                    <td class="tdname" valign="top"><a>*&nbsp;&nbsp;</a>工作年限：</td>
                                    <td >
                                        <?php
                                            $working_age = isset($supply->working_age) ? $supply->working_age : old('working_age');
                                            ?>
                                        <select style="width:140px; height: 28px;" name="working_age">
                                            <option value="">工作年限：</option>
                                            @foreach(config('data')['personal']['working_age'] as $v)
                                                <option @if($working_age == $v) selected="selected" @endif value="{{ $v }}">{{ $v }}</option>
                                            @endforeach
                                        </select>&nbsp;&nbsp;
                                        <a>*&nbsp;&nbsp;</a>学历：
                                        <?php
                                            $education = isset($supply->education) ? $supply->education : old('education');
                                            ?>
                                        <select style="width:146px; height: 28px;" name="education">
                                            <option value="">选择学历：</option>
                                            @foreach(config('data')['personal']['education'] as $v)
                                                <option @if($education == $v) selected="selected" @endif value="{{ $v }}">{{ $v }}</option>
                                            @endforeach
                                        </select>
                                    </td> 
                                </tr>
                                <tr>
                                    <td class="tdname" valign="top"><a>*&nbsp;&nbsp;</a>上岗时间：</td>
                                    <td><input class="inp" type="text" name="working_time" value="{{ $supply->working_time or old('working_time') }}" onclick="laydate({istime: false, format: 'YYYY-MM-DD'})" /></td>
                                </tr> 
                                <tr>
                                    <td class="tdname" valign="top"><a>*&nbsp;&nbsp;</a>劳务费用：</td>
                                    <td >
                                        <input class="price-num" type="number" name="price" value="{{ $supply->price or old('price') }}" />
                                        <?php
                                            $price_type = isset($supply->price_type) ? $supply->price_type : old('price_type');
                                            ?>
                                        <select class="price-type" name="price_type">
                                            @foreach(config('data')['personal']['price_type'] as $v)
                                                <option @if($price_type == $v) selected="selected" @endif value="{{ $v }}">{{ $v }}</option>
                                            @endforeach
                                        </select>
                                    </td> 
                                </tr>
                                <tr>
                                    <td class="tdname" valign="top"><a>*&nbsp;&nbsp;</a>手机/电话：</td>
                                    <td >
                                        <input style="width:135px; height: 28px;" type="text" name="phone" value="{{ $supply->phone or old('phone') }}" />&nbsp;&nbsp;
                                        <a>*&nbsp;&nbsp;</a>联系人：
                                        <input style="width:120px; height: 28px;" type="text" name="contacts" value="{{ $supply->contacts or old('contacts') }}" />
                                    </td>
                                </tr>
                                 <tr>
                                    <td class="tdname" valign="top">福利：</td>
                                    <td >
                                        <?php
                                            $benefits = (isset($supply->benefits)) ? $supply->benefits : old('benefits');
                                            ?>
                                        @foreach(config('data')['personal']['benefits'] as $v)
                                            <input @if(in_array($v, (array) $benefits)) checked="checked" @endif class="check" type="checkbox" name="benefits[]" value="{{ $v }}" /> {{ $v }}
                                        @endforeach
                                    </td> 
                                </tr>
                                 <tr>
                                    <td class="tdname" valign="top">职位描述：</td>
                                    <td >
                                        <textarea class="describe" type="text" name="desc">{{ $supply->supply->desc or old('desc') }}</textarea>
                                    </td> 
                                </tr>     
                                <tr >
                                    <td class="clickandsubmit"></td>
                                    <td class="cas">
                                        <input class="sub" type="checkbox" name="agree" /> 我已阅读并同意<a href="">《人员供应相关条款》</a>
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