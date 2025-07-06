<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                    type="button"
                    class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                        </path>
                    </svg>
                </button>
                <a href="https://flowbite.com" class="flex ms-2 md:me-24">
                    <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 me-3" alt="FlowBite Logo" />
                    <span
                        class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">Flowbite</span>
                </a>
            </div>
            <div class="flex items-center">
                <div class="flex items-center ms-3">
                    <div>
                        <button type="button"
                            class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                            aria-expanded="false" data-dropdown-toggle="dropdown-user">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 rounded-full" src="{{ auth()->user()->image_url }}" alt="user photo">
                        </button>
                    </div>
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-sm shadow-sm dark:bg-gray-700 dark:divide-gray-600"
                        id="dropdown-user">
                        <div class="px-4 py-3" role="none">
                            <p class="text-sm text-gray-900 dark:text-white" role="none">
                                {{ auth()->user()->name }}
                            </p>
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                                {{ auth()->user()->email }}
                            </p>
                        </div>
                        <ul class="py-1" role="none">
                            <li>
                                <a href="{{ route('admin.auth.logout') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                    role="menuitem">Sign out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            {{-- @if (auth()->user()->hasRole('superadmin'))
                <li class="text-gray-400">Master</li>
            @endif --}}
            <li>
                <a href="{{ route('admin.index') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path
                            d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path
                            d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            @if (auth()->user()->hasAnyPermission(['settings']) or auth()->user()->hasRole('superadmin'))
                @can('settings')
                    <li>
                        <button type="button"
                            class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                            aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                            <i
                                class="fa-solid fa-gear shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                            <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Settings</span>
                            <i class="fa-solid fa-chevron-down w-3 h-3"></i>
                        </button>
                        @php
                            $settingMenus = [
                                [
                                    'label' => 'Logo',
                                    'name' => 'logo',
                                    'route' => 'admin.settings.logo.edit',
                                ],
                                [
                                    'label' => 'Basic Info',
                                    'name' => 'basic-info',
                                    'route' => 'admin.settings.basic-info.edit',
                                ],
                                [
                                    'label' => 'About',
                                    'name' => 'about',
                                    'route' => 'admin.settings.about.edit',
                                ],
                                [
                                    'label' => 'Social Media',
                                    'name' => 'social-media',
                                    'route' => 'admin.social.index',
                                ],
                            ];

                        @endphp
                        <ul id="dropdown-example" class="@if ($menuActive != 'settings') hidden @endif py-2 space-y-2">
                            @foreach ($settingMenus as $menu)
                                <li>
                                    <a href="{{ route($menu['route']) }}"
                                        class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">{{ $menu['label'] }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endcan
            @endif

            @if (auth()->user()->hasAnyPermission(['hotels read']) or auth()->user()->hasRole('superadmin'))
                @can('hotels read')
                    <li>
                        <a href="{{ route('admin.hotels.index') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <i
                                class="fa-solid fa-hotel shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                            <span class="ms-3">Hotel</span>
                        </a>
                    </li>
                @endcan
            @endif

            @if (auth()->user()->hasAnyPermission(['settings']) or auth()->user()->hasRole('superadmin'))
                @can('settings')
                    <li>
                        <button type="button"
                            class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                            aria-controls="dropdown-transportations" data-collapse-toggle="dropdown-transportations">
                            <i
                                class="fa-solid fa-plane-departure shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                            <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Transportations</span>
                            <i class="fa-solid fa-chevron-down w-3 h-3"></i>
                        </button>
                        @php
                            $transportationMenus = [
                                [
                                    'label' => 'Airline',
                                    'name' => 'transportations',
                                    'route' => 'admin.transportations.index',
                                ],
                                [
                                    'label' => 'Trip',
                                    'name' => 'transportation-trips',
                                    'route' => 'admin.transportation-trips.index',
                                ],
                            ];

                        @endphp
                        <ul id="dropdown-transportations"
                            class="@if ($menuActive != 'transportations') hidden @endif py-2 space-y-2">
                            @foreach ($transportationMenus as $menu)
                                <li>
                                    <a href="{{ route($menu['route']) }}"
                                        class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">{{ $menu['label'] }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endcan
            @endif


            @if (auth()->user()->hasAnyPermission(['pilgrimage batches read', 'pilgrimage types read']) or
                    auth()->user()->hasRole('superadmin'))
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                        aria-controls="dropdown-pilgrimage" data-collapse-toggle="dropdown-pilgrimage">
                        <i
                            class="fa-solid fa-kaaba shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Pilgrimage</span>
                        <i class="fa-solid fa-chevron-down w-3 h-3"></i>
                    </button>
                    @php
                        $pilgrimageMenus = [
                            [
                                'label' => 'Type',
                                'name' => 'pilgrimage-type',
                                'permission' => 'pilgrimage types read',
                                'route' => 'admin.pilgrimage-type.index',
                            ],
                            [
                                'label' => 'Batch',
                                'name' => 'pilgrimage-batch',
                                'permission' => 'pilgrimage batches read',
                                'route' => 'admin.pilgrimage-batch.index',
                            ],
                        ];
                    @endphp
                    <ul id="dropdown-pilgrimage" class="@if ($menuActive != 'pilgrimage') hidden @endif py-2 space-y-2">
                        @foreach ($pilgrimageMenus as $menu)
                            @can($menu['permission'])
                                <li>
                                    <a href="{{ route($menu['route']) }}"
                                        class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">{{ $menu['label'] }}</a>
                                </li>
                            @endcan
                        @endforeach
                    </ul>
                </li>
            @endif
            @if (auth()->user()->hasAnyPermission(['itineraries read']) or auth()->user()->hasRole('superadmin'))
                @can('itineraries read')
                    <li>
                        <a href="{{ route('admin.itineraries.index') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <i
                                class="fa-solid fa-map-location-dot shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                            <span class="ms-3">Itineraries</span>
                        </a>
                    </li>
                @endcan
            @endif

            @if (auth()->user()->hasAnyPermission(['customers read']) or auth()->user()->hasRole('superadmin'))
                @can('customers read')
                    <li>
                        <a href="{{ route('admin.customers.index') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <i
                                class="fa-solid fa-user-group shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                            <span class="ms-3">Customer</span>
                        </a>
                    </li>
                @endcan
            @endif

            @if (auth()->user()->hasAnyPermission(['inboxes read']) or auth()->user()->hasRole('superadmin'))
                <li class="text-gray-400 capitalize">Management</li>
                @can('inboxes read')
                    <li>
                        <a href="{{ route('admin.inboxes.index') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <i
                                class="fa-solid fa-inbox shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                            <span class="flex-1 ms-3 whitespace-nowrap">Inboxes</span>
                        </a>
                    </li>
                @endcan
            @endif

            @if (auth()->user()->hasAnyPermission(['users read', 'roles read']) or auth()->user()->hasRole('superadmin'))
                <li class="text-gray-400 capitalize">Profile</li>
                @can('users read')
                    <li>
                        <a href="{{ route('admin.users.index') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <i
                                class="fa-solid fa-user shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                            <span class="flex-1 ms-3 whitespace-nowrap">Users</span>
                        </a>
                    </li>
                @endcan

                @can('roles read')
                    <li>
                        <a href="{{ route('admin.roles.index') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <i
                                class="fa-solid fa-users-gear shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                            <span class="flex-1 ms-3 whitespace-nowrap">Roles</span>
                        </a>
                    </li>
                @endcan
            @endif
        </ul>
    </div>
</aside>
