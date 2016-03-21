@if ($type == 'warehouse')
    @include('demand.warehouse_edit')
@elseif ($type == 'vehicle')
    @include('demand.vehicle_edit')
@elseif ($type == 'personal')
    @include('demand.personal_edit')
@elseif ($type == 'building')
    @include('demand.building_edit')
@elseif ($type == 'general')
    @include('demand.general_edit')
@else
    无此内容
@endif