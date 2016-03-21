@extends('common.page')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('static/css/user_login.css') }}">
@endsection

@section('nav')
	<div class="nav-search"><a href="{{ Url('user/login') }}">用户登录</a></div>
@endsection

@section('content')
	<div class="mainbody">
		<div class="container">
			<div class="user-page">
				<div class="user-information">
					<div class="inf-logo"></div>
					<div class="inf-title">用户登录</div>
					<a class="inf-forgetpassword" href="{{ url('user/findpassword') }}">找回密码</a>
					<a class="inf-login" href="{{ url('user/register') }}">注册</a>
				</div>
				<div class="information-table">
					<div class="error">{{ $errors->first() }}</div>
				    <form method="post" action="">
						{{ csrf_field() }}
				    	<table cellpadding="0" cellspacing="0" class="onerent" align="center">
							<tr>
								<td class="tdname" valign="top">用户名：</td>
								<td><input name="username" type="text" value="" /></td>
							 </tr>
							 <tr>
								<td class="tdname" valign="top">密  码： </td>
								<td><input name="password" type="password" value="" /></td>
							</tr>
							<!--<tr>
								<td class="tdname" valign="top">验证码</td>
								<td><input class="identifying-code" name="identifying-code" value="" /></td>
							</tr>-->
							<tr>
								<td></td>
								<td><!--<input class="resset" type="submit" value="重置" />-->
									<button class="login-button" type="submit">登录</button>
								</td>
							</tr>
				        </table>
				    </form>
			    </div>
		    </div>
	    </div>
    </div>
@endsection