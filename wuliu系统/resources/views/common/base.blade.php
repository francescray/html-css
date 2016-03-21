<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>物流园区-企业协同共享系统</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('static/css/common.css') }}">

    @section('css')
    @show

    <script type="text/javascript" src="http://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/URI.js/1.17.1/URI.min.js"></script>
    <script src="{{ url('static/lib/layer/layer.js') }}"></script>
    <script src="{{ url('static/js/main.js') }}"></script>

    @section('js')
    @show
</head>
<body>

@section('body')
@show

@include('include.footer')

</body>
</html>