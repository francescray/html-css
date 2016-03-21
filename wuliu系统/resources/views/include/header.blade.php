<div class="header-logo">
    <div class="container">
        <a href="{{ url('/') }}"><div class="header-title1">物流园区</div></a>
        <a href="{{ url('/') }}"><div class="header-title2">物流企业协同工作系统</div></a>
        @if(\App\Model\User::user() == null)
            <div class="signup"><a href="{{ url('user/register') }}">注册</a>&nbsp;</div>
            <div class="signin"><a href="{{ url('user/login') }}">登录</a>&nbsp;&nbsp;</div>
        @else
            <div class="signin">
                欢迎您！&nbsp;&nbsp;<a href="{{ url('user') }}">{{ \App\Model\User::user()->username }}</a>&nbsp;&nbsp;
                <a href="{{ url('user/logout') }}">退出</a>
            </div>
        @endif
    </div>
</div> 
<div class="navigation">
    <div class="container">
        <div class="nav-home"><a href="{{ url('/') }}">首页</a></div>
        @section('nav')
        @show
        <form id="search" action="" class="nav-searchbar" method="get" role="search">
            <div class="nav-left">
                <select id="search-type" class="nav-select">
                    <option value="warehouse">找仓库</option>
                    <option value="vehicle">找车辆</option>
                    <option value="personal">找人员</option>
                </select>
                <input name="title" class="searchbar" type="text" value="{{ request('title') }}">
            </div>
            <input class="nav-searchbottom" type="submit" value="搜索" >
        </form>
    </div>
</div>
<script>
    $('#search').submit(function() {
        var seachType = $('#search-type').val();
        this.action = '/supply/s/' + seachType;
    });
</script>