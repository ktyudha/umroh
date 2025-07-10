<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
{{--  <link rel="shortcut icon" href="{{ asset(@$setting->firstWhere('key', 'icon')->value) }}">  --}}
<link rel="shortcut icon" href="{{ asset('static/assets/logo-zamira-round.svg') }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<title>@yield('title', 'Zamira') | Zamira</title>

@section('meta')
    @yield('metadata')
    <meta name="keywords" content="{{ @$about->meta_keywords }}" />
    <meta name="title" content="Umroh" />
    <meta name="description" content="Umroh" />
    {{--  <meta name="author" content="{{ @$setting->firstWhere('key', 'name')->value }}" />  --}}
    {{--  <meta property="og:title" content="{{ @$about->title }}">  --}}
    {{--  <meta property="og:description" content="{{ @$about->meta_description }}">  --}}
    {{-- <meta property="og:url" content="{{ route('landing.index', ['lang' => app()->getLocale()]) }}"> --}}
    <meta property="og:type" content="website">
    {{--  <meta property="og:image" content="{{ asset(@$setting->firstWhere('key', 'ogimage')->value) }}">  --}}
@show
