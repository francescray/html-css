@extends('common.page')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('static/css/user_login.css') }}">
@endsection

@section('nav')
	<div class="nav-search"><a href="{{ Url('user/login') }}">信息发布</a></div>
@endsection

@section('content')
	<div class="mainbody">
		<div class="container">
			<div class="user-page">
				<div class="user-information">
					<div class="inf-logo-password"></div>
					<div class="inf-title">获取密码</div>
				</div>
				<div class="information-table">
					<div class="error">{{ $errors->first() }}</div>
				    <form method="post" action="">
						<input type="hidden" name="_token" value="{{ csrf_token() }}" />
				    	<table cellpadding="0" cellspacing="0" class="onerent">
					    	<tbody>
	                            <tr>
					        		<td class="tdname" valign="top">邮箱：</td>
					        	 	<td><input name="username" type="email" value="" /></td>
					        	 </tr>
					       	 	<tr>
					       	 		<td class="tdname" valign="top">验证码</td>
					       	 		<td><input class="identifying-code" name="identifying-code" value="" /></td>
					       	 	</tr>
					       	 	<tr>
					       	 		<td></td>
					       	 		<td><!--<button class="resset" type="submit" value="重置" ></button>-->
					       	 		<button class="login-button" type="submit">提交</button></td>
					        	</tr>
                            </tbody>
				        </table>
				    </form>
			    </div>
		    </div>
	    </div>
    </div>
@endsection