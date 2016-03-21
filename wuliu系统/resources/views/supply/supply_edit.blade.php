@if ($type == 'warehouse')
    @include('supply.warehouse_edit')
@elseif ($type == 'vehicle')
    @include('supply.vehicle_edit')
@elseif ($type == 'personal')
    @include('supply.personal_edit')
@elseif ($type == 'building')
    @include('supply.building_edit')
@elseif ($type == 'general')
    @include('supply.general_edit')
@else
    无此内容
@endif