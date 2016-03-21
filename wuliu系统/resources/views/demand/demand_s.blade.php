@if ($type == 'warehouse')
    @include('demand.warehouse_s')
@elseif ($type == 'vehicle')
    @include('demand.vehicle_s')
@elseif ($type == 'personal')
    @include('demand.personal_s')
@elseif ($type == 'building')
    @include('demand.building_s')
@elseif ($type == 'general')
    @include('demand.general_s')
@else
    无此内容
@endif