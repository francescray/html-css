@extends('common.page')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('static/css/supply_type_edit.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('static/css/left_info.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('static/css/fileupload.css') }}">
    <link href="//cdn.bootcss.com/webuploader/0.1.1/webuploader.css" rel="stylesheet">
@stop

@section('js')
    <script src="//cdn.bootcss.com/webuploader/0.1.1/webuploader.min.js"></script>
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
                        <div class="instruct-name">发布车辆供应信息</div>
                        <div class="instruct-detail">登录后，请填写以下信息，提交车辆供应信息，审核后即可发布</div>
                    </div>
                    <a href=""><div class="ask-help">发布帮助</div></a>
                    <a href="{{ url('supply/page/vehicle') }}"><div class="require-list">车辆供应列表</div></a>
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
                                        <input class="inp" type="text" name="title" value="{{ $supply->supply->title or old('title') }}" />
                                    </td> 
                                </tr>
                                <tr>
                                    <td class="tdname" valign="top"><a>*&nbsp;&nbsp;</a>车辆服务区域：</td>
                                    <td >
                                        <?php 
                                            $zone = isset($supply->zone)? $supply->zone : old('zone');
                                        ?>
                                        <select class="sel" name="zone">
                                            <option value="">选择服务区域：</option>
                                            @foreach(config('data')['zone'] as $v)
                                                <option @if($zone == $v) selected="selected" @endif value="{{ $v }}">{{ $v }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>    
                                <tr>
                                    <td class="tdname" valign="top"><a>*&nbsp;&nbsp;</a>车辆类型：</td>
                                    <td >
                                        <?php
                                            $class = isset($supply->class) ? $supply->class : old('class');
                                            ?>
                                        <select class="sel" name="class">
                                            <option value="">选择车辆类型：</option>
                                            @foreach(config('data')['vehicle']['class'] as $v)
                                                <option @if($class == $v) selected="selected" @endif value="{{ $v }}">{{ $v }}</option>
                                            @endforeach
                                        </select>
                                    </td> 
                                </tr>    
                                <tr>
                                    <td class="tdname" valign="top"><a>*&nbsp;&nbsp;</a>车辆长度：</td>
                                    <td >
                                        <?php  
                                            $length = isset($supply->length) ? $supply->length : old('length');
                                        ?>
                                        <select class="sel" name="length">
                                            <option value="">请选择车厢长度</option>
                                            @foreach(config('data')['vehicle']['length'] as $v)
                                                <option @if($length == $v) selected="selected" @endif value="{{ $v }}">{{ $v }}</option>
                                            @endforeach
                                        </select>
                                    </td> 
                                </tr>    
                                <tr>
                                    <td class="tdname" valign="top"><a>*&nbsp;&nbsp;</a>装载：</td>
                                    <td >
                                        <input class="price-num" type="number" name="load" value="{{ $supply->supply->load or old('load')}}" />
                                        <?php
                                            $load_type = isset($supply->load_type) ? $supply->load_type : old('load_type');
                                            ?>
                                        <select class="price-type" name="load_type">
                                            @foreach(config('data')['vehicle']['load_type'] as $v)
                                                <option @if($load_type == $v) selected="selected" @endif value="{{ $v }}">{{ $v }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tdname" valign="top"><a>*&nbsp;&nbsp;</a>运输费用：</td>
                                    <td >
                                        <input class="price-num" type="number" name="price" value="{{ $supply->price or old('price') }}" />
                                        <?php
                                            $price_type = isset($supply->price_type) ? $supply->price_type : old('price_type');
                                            ?>
                                        <select class="price-type" name="price_type">
                                            @foreach(config('data')['vehicle']['price_type'] as $v)
                                                <option @if($price_type == $v) selected="selected" @endif value="{{ $v }}">{{ $v }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tdname" valign="top"><a>*&nbsp;&nbsp;</a>变速箱类型：</td>
                                    <td >
                                        <?php
                                            $gearbox = isset($supply->gearbox)? $supply->gearbox : old('gearbox');
                                        ?>
                                        <select name="gearbox" style="width:170px; height:28px; ">
                                            <option value="">请选择变速箱类型：</option>
                                            @foreach(config('data')['vehicle']['gearbox'] as $v)
                                                <option @if($gearbox == $v) selected="selected" @endif value="{{$v}}">{{$v}}</option>
                                            @endforeach
                                        </select>
                                        车龄：<input name="age" style="width: 134px; height: 28px;" value="{{$supply->age or old('age')}}" />&nbsp;&nbsp;年
                                    </td>
                                </tr>   
                                <tr>
                                    <td class="tdname" valign="top"><a>*&nbsp;&nbsp;</a>补充说明：</td>
                                    <td >
                                        <textarea  class="describe" type="text" name="desc">{{ $supply->supply->desc or old('desc') }}</textarea>
                                    </td> 
                                </tr>
                                <tr>
                                    <td class="tdname" valign="top"><a>*&nbsp;&nbsp;</a>手机/电话：</td>
                                    <td >
                                        <input class="inp" type="text" name="phone" value="{{ $supply->phone or old('phone') }}" />
                                    </td> 
                                </tr> 
                                <tr>
                                    <td class="tdname" valign="top"><a>*&nbsp;&nbsp;</a>联系人：</td>
                                    <td >
                                        <input class="inp" type="text" name="contacts" value="{{ $supply->contacts or old('contacts') }}" />
                                    </td> 
                                </tr> 
                                <tr>
                                    <td class="clickandsubmit"></td>
                                    <td class="cas">
                                        <!--<input  class="loadpic" type="submit" name="explanation" value="上传图片">-->
                                        <div id="fileList" class="uploader-list">
                                            <?php
                                                $images = isset($supply->supply->images) ? $supply->supply->images : old('images'); ?>
                                            @foreach((array) $images as $v)
                                                <div class="file-item thumbnail">
                                                    <img src="{{ \App\Lib\File\FileUpload::url($v) }}" width="80" height="80" />
                                                    <div class="del">删除</div>
                                                    <input type="hidden" name="images[]" value="{{ $v }}" />
                                                </div>
                                            @endforeach
                                        </div>
                                        <div id="filePicker">选择图片</div> 按住"ctrl"键可一次选择多张图片，多余8张取消前8张上传
                                    </td> 
                                </tr>    
                                <tr >
                                    <td class="clickandsubmit"></td>
                                    <td class="cas">
                                        <input class="sub" type="checkbox" name="agree" value="1"/>我已阅读并同意<a href="">《车辆供应相关条款》</a>
                                        <a href=""><input class="submit" type="submit" value="马上发布" /></td></a>
                                </tr>
                            </tbody>
                        </table>
                        <script>
                            // 初始化Web Uploader
                            var uploader = WebUploader.create({
                                // 选完文件后，是否自动上传。
                                auto: true,
                                // swf文件路径
                                swf: 'http:///cdn.bootcss.com/webuploader/0.1.1/Uploader.swf',
                                // 文件接收服务端。
                                server: '/upload/image',
                                // 选择文件的按钮。可选。
                                // 内部根据当前运行是创建，可能是input元素，也可能是flash.
                                pick: '#filePicker',
                                // 只允许选择图片文件。
                                accept: {
                                    title: 'Images',
                                    extensions: 'gif,jpg,jpeg,bmp,png',
                                    mimeTypes: 'image/*'
                                }
                            });

                            // 当有文件添加进来的时候
                            uploader.on( 'fileQueued', function( file ) {
                                var $li = $(
                                        '<div id="' + file.id + '" class="file-item thumbnail">' +
                                        '<img>' +
                                        '</div> ');
                                var $img = $li.find('img');

                                // $list为容器jQuery实例
                                $('#fileList').append($li);

                                // 创建缩略图
                                // 如果为非图片文件，可以不用调用此方法。
                                // thumbnailWidth x thumbnailHeight 为 100 x 100
                                uploader.makeThumb( file, function( error, src ) {
                                    if ( error ) {
                                        $img.replaceWith('<span>浏览器版本过低，不能预览</span>');
                                        return;
                                    }
                                    $img.attr( 'src', src );
                                }, 80, 80);
                            });

                            // 文件上传过程中创建进度条实时显示。
                            uploader.on( 'uploadProgress', function( file, percentage ) {
                                var $li = $( '#'+file.id );
                                var $percent = $li.find('.progress span');

                                // 避免重复创建
                                if ( !$percent.length ) {
                                    $percent = $('<p class="progress"><span></span></p>')
                                            .appendTo( $li )
                                            .find('span');
                                }

                                $percent.css( 'width', percentage * 100 + '%' );
                            });

                            // 文件上传成功，给item添加成功class, 用样式标记上传成功。
                            uploader.on( 'uploadSuccess', function( file, response ) {
                                $file = $( '#'+file.id );
                                if (response.code == 0) {
                                    $file.addClass('upload-state-done');
                                    $file.append('<div class="del">删除</div><input type="hidden" name="images[]" value="' + response.data.path + '" />');
                                } else {
                                    upload_error(file);
                                }
                            });

                            // 文件上传失败，显示上传出错。
                            uploader.on( 'uploadError', function( file ) {
                                upload_error(file);
                            });

                            // 完成上传完了，成功或者失败，先删除进度条。
                            uploader.on( 'uploadComplete', function( file ) {
                                $( '#'+file.id ).find('.progress').remove();
                            });

                            function upload_error(file) {
                                var $li = $( '#'+file.id ),
                                        $error = $li.find('div.error');

                                // 避免重复创建
                                if ( !$error.length ) {
                                    $error = $('<div class="error"></div>').appendTo( $li );
                                    $li.append('<div class="del">删除</div>');
                                }
                                $error.text('上传失败');
                            }

                            // 删除图片
                            var $filelist = $('#fileList');
                            $filelist.on('click', '.del', function(e) {
                                var id = $(this).parent().attr('id');
                                if (typeof(id) != 'undefined') {
                                    uploader.removeFile($(this).parent().attr('id'));
                                }

                                $(this).parent().remove();
                            });
                        </script>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop