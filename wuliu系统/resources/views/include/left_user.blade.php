<div class="left">
    <div class="pc">我的信息</div>
    <ul>
        <li @if(request()->getPathInfo() == '/user') class="select" @endif><a href="{{ url('user') }}">基本信息</a></li>
        <li @if(request()->getPathInfo() == '/user/password') class="select" @endif><a href="{{ url('user/password') }}">修改密码</a></li>
    </ul>
    <div class="pc">供需信息管理</div>
    <ul>
        <li @if(request()->getPathInfo() == '/user/supply') class="select" @endif><a href="{{ url('user/supply') }}">供应信息</a></li>
        <li @if(request()->getPathInfo() == '/user/demand') class="select" @endif><a href="{{ url('user/demand') }}">需求信息</a></li>
        <li><a href="{{ url('supply/create/warehouse') }}">发布供需信息</a></li>
    </ul>
    <div class="pc">我的消息</div>
    <ul>
        <li @if(request()->getPathInfo() == '/cooperation/page/recv') class="select" @endif> <!--class="new"--><a href="{{ url('cooperation/page/recv') }}">收到的合作意向</a></li>
        <li @if(request()->getPathInfo() == '/cooperation/page/send') class="select" @endif><a href="{{ url('cooperation/page/send') }}">发出的合作意向</a></li>
        <li @if(request()->getPathInfo() == '/message/supply') class="select" @endif><a href="{{ url('message/supply') }}">订阅的供应信息</a></li>
        <li @if(request()->getPathInfo() == '/message/demand') class="select" @endif><a href="{{ url('message/demand') }}">订阅的需求信息</a></li>
    </ul>
</div>