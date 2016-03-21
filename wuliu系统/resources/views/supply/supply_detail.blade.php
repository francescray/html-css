@if ($supply instanceof \App\Model\Supply\Warehouse)
    @include('supply.warehouse_detail')
@elseif ($supply instanceof \App\Model\Supply\Vehicle)
    @include('supply.vehicle_detail')
@elseif ($supply instanceof \App\Model\Supply\Personal)
    @include('supply.personal_detail')
@elseif ($supply instanceof \App\Model\Supply\Building)
    @include('supply.building_detail')
@elseif ($supply instanceof \App\Model\Supply\General)
    @include('supply.general_detail')
@else
    无此内容
@endif