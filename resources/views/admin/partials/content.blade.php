<div class="root">

    <div class="preloader">
        <div class="preloader__image" style="background-image: url('{{ asset('static/website/images/logo_hbs.png') }}');">
        </div>
    </div>

    @include('website.partials.navbar')

    @yield('content')

    @include('website.partials.floating-button')
    @include('website.partials.footer')
</div>
