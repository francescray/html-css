@if ($demand instanceof \App\Model\Demand\Warehouse)
    @include('demand.warehouse_detail')
@elseif ($demand instanceof \App\Model\Demand\Vehicle)
    @include('demand.vehicle_detail')
@elseif ($demand instanceof \App\Model\Demand\Personal)
    @include('demand.personal_detail')
@elseif ($demand instanceof \App\Model\Demand\Building)
    @include('demand.building_detail')
@elseif ($demand instanceof \App\Model\Demand\General)
    @include('demand.general_detail')
@else
    无此内容
@endif