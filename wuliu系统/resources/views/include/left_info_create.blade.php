<div class="left">
    <div class="sd">发布供应信息</div>
    <ul>
        <li @if(request()->getPathInfo() == '/supply/create/warehouse') class="select" @endif><a href="{{ url('supply/create/warehouse') }}">仓库供应信息</a></li>
        <li @if(request()->getPathInfo() == '/supply/create/vehicle') class="select" @endif><a href="{{ url('supply/create/vehicle') }}">车辆供应信息</a></li>
        <li @if(request()->getPathInfo() == '/supply/create/personal') class="select" @endif><a href="{{ url('supply/create/personal') }}">人员供应信息</a></li>
        <!--<li><a href="">楼宇供应信息</a></li>
        <li><a href="">综合资源供应信息</a></li>-->
    </ul>
    <div class="sd">发布需求信息</div>
    <ul>
        <li @if(request()->getPathInfo() == '/demand/create/warehouse') class="select" @endif><a href="{{ url('demand/create/warehouse') }}">仓库需求信息</a></li>
        <li @if(request()->getPathInfo() == '/demand/create/vehicle') class="select" @endif><a href="{{ url('demand/create/vehicle') }}">车辆需求信息</a></li>
        <li @if(request()->getPathInfo() == '/demand/create/personal') class="select" @endif><a href="{{ url('demand/create/personal') }}">人员需求信息</a></li>
        <!--<li><a href="">楼宇需求信息</a></li>
        <li><a href="">综合资源需求信息</a></li>-->
    </ul>
</div>