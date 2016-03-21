@extends('common.page')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('static/css/supply_type_edit.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('static/css/user_info.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('static/css/left_user.css') }}">
@stop

@section('js')
    <script type="text/javascript" src="{{asset('static/js/select.js')}}"></script>
@stop

@section('nav')
    <div class="nav-search"><a href="{{ Url('user') }}">基本信息</a></div>
@stop

@section('content')
	<div class="mainbody">
        <div class="container">
            @include('include/left_user')
            
            <div class="right">
                <div class="firstpart">
                    <div class="instruct">
                        <div class="instruct-name">用户基本信息</div>
                        <div class="instruct-detail">登录后，可以修改以下信息</div>
                    </div>
                </div>
                <div class="secondpart">
                    <form action="" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <table cellpadding="0" cellspacing="0" class="coporation-inf">
                            <tbody>
                                <tr>
                                    <td class="tdname" valign="top">登录名：</td>
                                    <td>{{ $user->username }}</td>
                                </tr>
                                <tr>
                                    <td class="tdname" valign="top">注册手机号：</td>
                                    <td>{{ $user->phone }}</td>
                                </tr>
                                <tr>
                                    <td class="tdname" valign="top">公司全称：</td>
                                    <td >
                                        <input class="inp" type="text" name="company" value="{{ $user->info->company or old('company') }}" />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tdname" valign="top">主营业务：</td>
                                    <td >
                                        <input class="inp" type="text" name="main_business" value="{{ $user->info->main_business or old('main_business') }}" />
                                    </td> 
                                </tr>  
                                <tr>
                                    <td class="tdname" valign="top">公司规模：</td>
                                    <td >
                                        <input class="inp" type="text" name="company_size" value="{{ $user->info->company_size or old('company_size') }}" />
                                    </td> 
                                    <td class="tdunit" valign="top"></td>
                                </tr>  
                                <tr>
                                    <td class="tdname" valign="top">企业代码：</td>
                                    <td >
                                        <input class="inp" type="text" name="comopany_code" value="{{ $user->info->comopany_code or old('comopany_code') }}" />
                                    </td> 
                                </tr>   
                                <tr>
                                    <td class="tdname" valign="top">其他：</td>
                                    <td >
                                        <input class="inp" type="text" name="other" value="{{ $user->info->other or old('other') }}" />
                                    </td>
                                </tr>    
                                <tr >
                                    <td class="clickandsubmit"></td>
                                    <td class="cas">
                                        <a href=""><input class="submit" type="submit" value="编辑信息" /></a>
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