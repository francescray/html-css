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
    <div class="nav-search"><a href="{{ Url('user/password') }}">修改密码</a></div>
@stop

@section('content')
    <div class="mainbody">
        <div class="container">
            @include('include/left_user')

            <div class="right">
                <div class="firstpart">
                    <div class="instruct">
                        <div class="instruct-name">修改密码</div>
                    </div>
                </div>
                <div class="secondpart">
                    <div class="error">{{ $errors->first() }}</div>
                    <form action="" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <table cellpadding="0" cellspacing="0" class="coporation-inf">
                            <tbody>
                            <tr>
                                <td class="tdname" valign="top">原密码：</td>
                                <td >
                                    <input class="inp" type="password" name="old_password" />
                                </td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="tdname" valign="top">新密码：</td>
                                <td >
                                    <input class="inp" type="password" name="password" />
                                </td>
                                <td class="tdunit" valign="top"></td>
                            </tr>
                            <tr>
                                <td class="tdname" valign="top">重复新密码：</td>
                                <td >
                                    <input class="inp" type="password" name="re_password" />
                                </td>
                                <td class="tdunit" valign="top"></td>
                            </tr>
                            <tr >
                                <td class="clickandsubmit"></td>
                                <td class="cas">
                                    <a href=""><input class="submit" type="submit" value="修改密码" /></a>
                                </td>
                                <td>&nbsp;</td>
                            </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop