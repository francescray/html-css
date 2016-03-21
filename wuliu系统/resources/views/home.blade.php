@extends('common.base')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('static/css/homepage.css') }}">
@stop

@section('body')
    <div class="front-cover">
        <div class="title">物流园区&nbsp;企业协同共享工作系统</div>
        <form id="search-main" action="" method="get">
            <div class="search" >
                <div class="search-option">
                    <div search-type="warehouse" class="select">找仓库</div>
                    <div search-type="vehicle">找车辆</div>
                    <div search-type="personal">找人员</div>
                </div>
                <div class="arrow">
                    <div class="sbottom"></div>
                </div>
                <div class="sbox"><input id="search-title" name="title" class="search-box" type="text" value=""></div>
                <div class="search-botton"></div>
                <!--<a href=""><div class="map-search"></div></a>-->
            </div>
        </form>
    </div>
    <div class="opt">
        <div class="three-option">
            <div class="release-news">
                <div class="rn">发布信息</div>
                <div class="pen">
                    <a href="{{ url('supply/create/warehouse') }}"><div class="photo1"></div></a>
                </div>
                <div class="rndetail">包括信息目录管理、信息发布和信息检索</div>
                <div class="gorelease"><a href="{{ url('supply/create/warehouse') }}">去发布</a></div>
            </div>
            <div class="message-list">
                <div class="ml">信息列表</div>
                <div class="list">
                    <a href="{{ url('supply/page/warehouse') }}"><div class="photo2"></div></a>
                </div>
                <div class="mldetail">已发布的仓库、车辆、人员恭喜那个信息</div>
                <div class="goshare"><a href="{{ url('supply/page/warehouse') }}">找共享</a></div>
            </div>
            <div class="personal-center">
                <div class="pc">个人中心</div>
                <div class="people">
                    <a href="{{ url('user') }}"><div class="photo3"></div></a>
                </div>
                <div class="pcdetail">提供注册、登入、个人信息等管理功能</div>
                <div class="gomanage"><a href="{{ url('user') }}">去管理<a href="{{ url('user') }}"></div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script >
        $(function() {
            // 切换文章和问答
            $('.front-cover .search .search-option .select').ready(function() {
                var X = $('.front-cover .search ').offset().left;
                var pianyi = $('.front-cover .search .search-option .select').css('width');
                var pp = parseInt(X) + parseInt(pianyi) / 2 + 16;
                $('.front-cover .search .arrow .sbottom').css({left:pp});
            })
            $('.front-cover .search .search-option > div').click(function() {
                if (! $(this).hasClass('select')) {
                    $('.front-cover .search .search-option > div').removeClass('select');
                    $(this).addClass('select');
                }
                if ($(this).hasClass('select')) {
                    var X = $(this).offset().left;
                    var pianyi = $('.front-cover .search .search-option .select').css('width');
                    var pp = parseInt(X) + parseInt(pianyi) / 2 + 8;
                    $('.front-cover .search .arrow .sbottom').css({left:pp});
                }
            });
            $('.search-botton').click(function() {
                $('#search-main').submit();
            });

            $('#search-main').submit(function () {
                var type = $('.search-option > .select').attr('search-type');
                $('#search-main').attr('action', '/supply/s/' + type);
            });
        });
    </script>
@stop