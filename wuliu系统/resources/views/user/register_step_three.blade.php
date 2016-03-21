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
					<div class="int-step">第<a>2</a>步：填写公司资料</div>
				</div>
				<div class="information-table">
					<div class="error">{{ $errors->first() }}</div>
				    <form method="post" action="">
						<input type="hidden" name="_token" value="{{ csrf_token() }}" />
				    	<table cellpadding="0" cellspacing="0" class="onerent">
					    	<tbody>
	                            <tr>
					        		<td class="tdname" valign="top"><a>*&nbsp;&nbsp;&nbsp;</a>公司简称：</td>
					        	 	<td><input class="check" type="checkbox" name="vehicle" value="Bike" /> 运输服务
										<input class="check" type="checkbox" name="vehicle" value="Car" /> 仓储服务
										<input class="check" type="checkbox" name="vehicle" value="Bike" /> 区域配送
										<input class="check" type="checkbox" name="vehicle" value="Car" /> 城市配送
										<input class="check" type="checkbox" name="vehicle" value="Bike" /> 危险品物流
										<input class="check" type="checkbox" name="vehicle" value="Car" /> 电子商务物流
										<input class="check" type="checkbox" name="vehicle" value="Bike" /> 其他
										<input class="check" type="checkbox" name="vehicle" value="Car" /> 冷链物流
										<input class="check" type="checkbox" name="vehicle" value="Bike" /> 保税物流
										<input class="check" type="checkbox" name="vehicle" value="Car" /> 物流金融
										<input class="check" type="checkbox" name="vehicle" value="Car" /> 大件物流
										<input class="check" type="checkbox" name="vehicle" value="Car" /> 供应链管理
										<input class="check" type="checkbox" name="vehicle" value="Car" /> 物流地产
										<input class="check" type="checkbox" name="vehicle" value="Car" /> 运输服务
									</td>
					        	</tr>
	                            <tr>
					        		<td class="tdname" valign="top"><a>*&nbsp;&nbsp;&nbsp;</a>公司全称：</td>
					        	 	<td><input name="username" type="text" value="" /></td>
					        	</tr>
	                            <tr>
					        		<td class="tdname" valign="top">企业类型：</td>
					        	 	<td><select class="direction">
											<option value=""><a href="">国企</a></option>
										</select></td>
					        	</tr>
	                            <tr>
					        		<td class="tdname" valign="top">详细地址：</td>
					        	 	<td><input name="username" type="text" value="" /></td>
					        	</tr>
	                            <tr>
					        		<td class="tdname" valign="top">邮编：</td>
					        	 	<td><input name="username" type="text" value="" /></td>
					        	</tr>
	                            <tr>
					        		<td class="tdname" valign="top">传真：</td>
					        	 	<td><input name="username" type="text" value="" /></td>
					        	</tr>
	                            <tr>
					        		<td class="tdname" valign="top">联系电话：</td>
					        	 	<td><input name="username" type="text" value="" /></td>
					        	</tr>
	                            <tr>
					        		<td class="tdname" valign="top">公司网址：</td>
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