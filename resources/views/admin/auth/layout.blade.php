<!DOCTYPE html>
<html lang="en">

<head>
    {{-- @include('admin.partials.metadata') --}}
    @include('admin.partials.styles')
</head>

<body>

    @yield('content')

    @include('admin.partials.scripts')
</body>

</html>
