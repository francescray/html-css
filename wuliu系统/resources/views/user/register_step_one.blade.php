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
					<div class="inf-logo-register"></div>
					<div class="inf-title-register">注册</div>
					<div class="int-step">第<a>1</a>步：填写联系人信息</div>
				</div>
				<div class="information-table">
					<div class="error">{{ $errors->first() }}</div>
				    <form method="post" action="">
						<input type="hidden" name="_token" value="{{ csrf_token() }}" />
				    	<table cellpadding="0" cellspacing="0" class="onerent">
					    	<tbody>
	                            <tr>
					        		<td class="tdname" valign="top"><a>*&nbsp;&nbsp;</a> 真实姓名：</td>
					        	 	<td><input name="username" type="text" value="" /></td>
					        	</tr>
					        	<tr>
					        		<td class="tdname" valign="top">性别：</td>
					        		<td><input class="check" type="checkbox" name="vehicle" value="Bike" /> 男
										<input class="check" type="checkbox" name="vehicle" value="Car" /> 女</td>
					        	</tr>
	                            <tr>
					        		<td class="tdname" valign="top">出生年月：</td>
					        	 	<td><input name="username" type="text" value="" /></td>
					        	</tr>
	                            <tr>
					        		<td class="tdname" valign="top">部门：</td>
					        	 	<td><input name="username" type="text" value="" /></td>
					        	</tr>
	                            <tr>
					        		<td class="tdname" valign="top">职位：</td>
					        	 	<td><input name="username" type="text" value="" /></td>
					        	</tr>
	                            <tr>
					        		<td class="tdname" valign="top">电子邮箱：</td>
					        	 	<td><input name="username" type="text" value="" /></td>
					        	</tr>
	                            <tr>
					        		<td class="tdname" valign="top">联系电话：</td>
					        	 	<td><input name="username" type="text" value="" /></td>
					        	</tr>
	                            <tr>
					        		<td class="tdname" valign="top">手机号码：</td>
					        	 	<td><input name="username" type="text" value="" /></td>
					        	</tr>
	                            <tr>
					        		<td class="tdname" valign="top">QQ：</td>
					        	 	<td><input name="username" type="text" value="" /></td>
					        	</tr>
	                            <tr>
					        		<td class="tdname" valign="top">MSN：</td>
					        	 	<td><input name="username" type="text" value="" />
					       	 		<button class="login-button" type="submit">下一步</button></td>
					        	</tr>
                            </tbody>
				        </table>
				    </form>
			    </div>
		    </div>
	    </div>
    </div>
@endsection