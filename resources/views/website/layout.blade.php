<!DOCTYPE html>
<html lang="en" class="light">

<head>
    @include('website.partials.metadata')
    @include('website.partials.styles')

</head>

<body class="dark:bg-gray-900 dark:text-white">

    @include('website.partials.navbar')

    <div style="margin-top: 70px;">
        @yield('content')
    </div>

    @include('website.partials.footer')
    @include('website.partials.scripts')
</body>

</html>
