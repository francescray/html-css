@if ($type == 'warehouse')
    @include('supply.warehouse_s')
@elseif ($type == 'vehicle')
    @include('supply.vehicle_s')
@elseif ($type == 'personal')
    @include('supply.personal_s')
@elseif ($type == 'building')
    @include('supply.building_s')
@elseif ($type == 'general')
    @include('supply.general_s')
@else
    无此内容
@endif