<!DOCTYPE html>
<html lang="en" class="light">

<head>
    @include('website.partials.metadata')
    @include('website.partials.styles')

</head>

<body class="dark:bg-gray-900 dark:text-white">

    @include('website.partials.navbar')

    @yield('content')

    @include('website.partials.footer')
    @include('website.partials.scripts')
</body>

</html>
