@if ($type == 'warehouse')
    @include('supply.warehouse_page')
@elseif ($type == 'vehicle')
    @include('supply.vehicle_page')
@elseif ($type == 'personal')
    @include('supply.personal_page')
@elseif ($type == 'building')
    @include('supply.building_page')
@elseif ($type == 'general')
    @include('supply.general_page')
@else
    无此内容
@endif