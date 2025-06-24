@php
    $navbars = [
        ['name' => 'home', 'label' => 'Beranda', 'route' => 'landing.index'],
        ['name' => 'registration', 'label' => 'Pendaftaran', 'route' => 'registration.index'],
        ['name' => 'regulation', 'label' => 'Persyaratan', 'route' => 'regulation.index'],
        ['name' => 'schedule', 'label' => 'Jadwal', 'route' => 'schedule.index'],
        ['name' => 'contact', 'label' => 'Kontak', 'route' => 'contact.index'],
        ['name' => 'faq', 'label' => 'FAQ', 'route' => 'faq.index'],
    ];
@endphp

<header>
    <div class="container">
        <div class="logo">
            <img src="https://flowbite.com/docs/images/logo.svg" alt="Logo Sahabat Nabawi">
            <h1>Sahabat Nabawi</h1>
        </div>
        <nav>
            <ul>
                @foreach ($navbars as $key => $navbar)
                    <li><a href="{{ route($navbar['route']) }}"
                            class="@if ($navbarActive === $navbar['name']) active @endif">{{ $navbar['label'] }}</a>
                    </li>
                @endforeach
            </ul>
        </nav>
        <div class="mobile-menu">
            <i class="fas fa-bars"></i>
        </div>
    </div>
</header>
