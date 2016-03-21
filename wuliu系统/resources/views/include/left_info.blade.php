<div class="left">
    <div class="sd">供应信息</div>
    <ul>
        <li @if(request()->getPathInfo() == '/supply/page/warehouse') class="select" @endif><a href="{{ url('supply/page/warehouse') }}">仓库供应信息</a></li>
        <li @if(request()->getPathInfo() == '/supply/page/vehicle') class="select" @endif><a href="{{ url('supply/page/vehicle') }}">车辆供应信息</a></li>
        <li @if(request()->getPathInfo() == '/supply/page/personal') class="select" @endif><a href="{{ url('supply/page/personal') }}">人员供应信息</a></li>
        <!--<li><a href="">楼宇供应信息</a></li>
        <li><a href="">综合资源供应信息</a></li>-->
    </ul>
    <div class="sd">需求信息</div>
    <ul>
        <li @if(request()->getPathInfo() == '/demand/page/warehouse') class="select" @endif><a href="{{ url('demand/page/warehouse') }}">仓库需求信息</a></li>
        <li @if(request()->getPathInfo() == '/demand/page/vehicle') class="select" @endif><a href="{{ url('demand/page/vehicle') }}">车辆需求信息</a></li>
        <li @if(request()->getPathInfo() == '/demand/page/personal') class="select" @endif><a href="{{ url('demand/page/personal') }}">人员需求信息</a></li>
        <!--<li><a href="">楼宇需求信息</a></li>
        <li><a href="">综合资源需求信息</a></li>-->
    </ul>
</div>