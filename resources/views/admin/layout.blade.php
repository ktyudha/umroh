<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.partials.metadata')
    @include('admin.partials.styles')

</head>

<body class="bg-gray-700">

    {{-- @include('admin.partials.navbar')  --}}

    @include('admin.partials.sidebar')

    <div class="px-6 sm:ml-64 my-20">
        @yield('content')
    </div>

    {{--  @yield('breadcrumb')  --}}
    {{--  @include('admin.partials.footer')  --}}
    @include('admin.partials.scripts')
</body>

</html>
