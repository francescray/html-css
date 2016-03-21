@if ($type == 'warehouse')
    @include('demand.warehouse_page')
@elseif ($type == 'vehicle')
    @include('demand.vehicle_page')
@elseif ($type == 'personal')
    @include('demand.personal_page')
@elseif ($type == 'building')
    @include('demand.building_page')
@elseif ($type == 'general')
    @include('demand.general_page')
@else
    无此内容
@endif