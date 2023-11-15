@section('content')
    <section class="content">
        @include('admin::partials.alerts')
        @include('admin::partials.exception')

        {!! $content !!}

        @include('admin::partials.toastr')
    </section>
@endsection

@section('app')
    {!! Isifnet\PieAdmin\Admin::asset()->styleToHtml() !!}

    <div class="content-body" id="app">
        {{-- 页面埋点--}}
        {!! admin_section(Isifnet\PieAdmin\Admin::SECTION['APP_INNER_BEFORE']) !!}

        @yield('content')

        {{-- 页面埋点--}}
        {!! admin_section(Isifnet\PieAdmin\Admin::SECTION['APP_INNER_AFTER']) !!}
    </div>

    {!! Isifnet\PieAdmin\Admin::asset()->scriptToHtml() !!}
    <div class="extra-html">{!! Isifnet\PieAdmin\Admin::html() !!}</div>
@endsection


@if(!request()->pjax())
    @include('admin::layouts.full-page', ['header' => $header])
@else
    <title>{{ Isifnet\PieAdmin\Admin::title() }} @if($header)
            | {{ $header }}
        @endif</title>

    <script>Dcat.wait();</script>

    {!! Isifnet\PieAdmin\Admin::asset()->cssToHtml() !!}
    {!! Isifnet\PieAdmin\Admin::asset()->jsToHtml() !!}

    @yield('app')
@endif
