@extends('common.page')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('static/css/supply_type_edit.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('static/css/left_info.css') }}">
@stop

@section('js')
    <script type="text/javascript" src="{{asset('static/js/select.js')}}"></script>
@stop

@section('content')
	<div class="mainbody">
       <div class="container">
            @include('include.left_info')
            
            <div class="right">
                <div class="apply">
                    <!--<div class="home-logo"></div>-->
                    <div class="instruct">
                        <div class="instruct-name">发布楼宇供应信息</div>
                        <div class="instruct-detail">提交楼宇供应相关信息，经审核后即可发布<br>
                        认证车辆可直接发信息，不需审核 &nbsp;&nbsp;&nbsp;<a href="">申请认证</a>
                        </div>
                    </div>
                </div>
                <div class="apply-detail">
                    <form name="messageform" action="" method="post">
                        <table cellpadding="0" cellspacing="0" class="onerent">
                            <tbody>
                                <tr>
                                    <td class="tdname" valign="top">楼宇位置：</td>
                                    <td >
                                        <input class="inp" type="text" name="orgin" />
                                    </td> 
                                </tr>
                                <tr>
                                    <td class="tdname" valign="top">楼宇面积：</td>
                                    <td >
                                        <input class="inp" type="text" name="dest" />
                                    </td>
                                </tr>    
                                <tr>
                                    <td class="tdname" valign="top">楼宇类型：</td>
                                    <td >
                                        <select class="sel">
                                            <option value="swarehouse">选择楼宇类型：</option>
                                            <option value="saab">高栏</option>
                                            <option value="opel">箱式</option>
                                            <option value="audi">包小车</option>
                                            <option value="audi">高地板</option>
                                            <option value="audi">拖挂</option>
                                            <option value="audi">配货</option>
                                            <option value="audi">集装箱</option>
                                            <option value="audi">平板</option>
                                        </select>
                                    </td> 
                                </tr>    
                                <tr>
                                    <td class="tdname" valign="top">车厢长度：</td>
                                    <td >
                                        <select class="sel">
                                            <option value="swarehouse">请选择车厢长度</option>
                                            <option value="saab">4米</option>
                                            <option value="saab">4.2米</option>
                                            <option value="saab">4.5米</option>
                                            <option value="saab">5.3米</option>
                                            <option value="saab">6米</option>
                                            <option value="saab">6.2米</option>
                                            <option value="saab">6.8米</option>
                                            <option value="saab">7.7米</option>
                                            <option value="saab">8米</option>
                                            <option value="saab">8.2米</option>
                                            <option value="saab">8.7米</option>
                                            <option value="saab">9.2米</option>
                                        </select>
                                    </td> 
                                </tr>    
                                <tr>
                                    <td class="tdname" valign="top">租金费用：</td>
                                    <td >
                                        <select class="sel">
                                            <option value="swarehouse">年付</option>
                                            <option value="saab">4米</option>
                                            <option value="saab">4.2米</option>
                                        </select>
                                    </td>
                                    <td >
                                        <input class="inpu" type="text" name="weight" />
                                    </td> 
                                    <td class="tdunit" valign="top">元</td>
                                </tr>
                                <tr>
                                    <td class="tdname" valign="top">起租时间：</td>
                                    <td >
                                        <input class="inp" type="text" name="transportationcosts" />
                                    </td>
                                </tr> 
                                 <tr>
                                    <td class="tdname" valign="top">说明：</td>
                                    <td >
                                        <input class="inp" type="text" name="explanation" />
                                    </td> 
                                </tr>    
                                <tr >
                                    <td class="clickandsubmit"></td>
                                    <td class="cas"><input class="sub" type="checkbox"/>我已阅读并同意<a href="">《供应条款》</a>
                                    <a href=""><input class="submit" type="submit" value="发布信息" /></td></a>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop