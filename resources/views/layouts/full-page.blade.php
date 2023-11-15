<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="chrome=1,IE=edge">
    {{-- 默认使用谷歌浏览器内核--}}
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>@if(! empty($header))
            {{ $header }} |
        @endif {{ Isifnet\PieAdmin\Admin::title() }}</title>

    @if(! config('admin.disable_no_referrer_meta'))
        <meta name="referrer" content="no-referrer"/>
    @endif

    @if(! empty($favicon = Isifnet\PieAdmin\Admin::favicon()))
        <link rel="shortcut icon" href="{{$favicon}}">
    @endif

    {!! admin_section(Isifnet\PieAdmin\Admin::SECTION['HEAD']) !!}

    {!! Isifnet\PieAdmin\Admin::asset()->headerJsToHtml() !!}

    {!! Isifnet\PieAdmin\Admin::asset()->cssToHtml() !!}
</head>

<body class="dcat-admin-body full-page {{ $configData['body_class'] }}">

<script>
    var Dcat = CreateDcat({!! Isifnet\PieAdmin\Admin::jsVariables() !!});
</script>

{{-- 页面埋点 --}}
{!! admin_section(Isifnet\PieAdmin\Admin::SECTION['BODY_INNER_BEFORE']) !!}

<div class="app-content content">
    <div class="wrapper" id="{{ $pjaxContainerId }}">
        @yield('app')
    </div>
</div>

{!! admin_section(Isifnet\PieAdmin\Admin::SECTION['BODY_INNER_AFTER']) !!}

{!! Isifnet\PieAdmin\Admin::asset()->jsToHtml() !!}

<script>Dcat.boot();</script>

</body>
</html>
