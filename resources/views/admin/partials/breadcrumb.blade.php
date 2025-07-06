<div
    class="block w-full bg-gray-100 py-6 rounded-lg dark:bg-gray-800 justify-between flex lg:flex-row flex-col px-10 lg:gap-0 gap-2 mb-10">
    <h1 class="text-4xl font-medium text-black dark:text-white">{{ isset($title) ? $title : 'Title' }}</h1>

    @if (isset($breadcrumbs) && count($breadcrumbs))
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                @foreach ($breadcrumbs as $index => $breadcrumb)
                    <li class="inline-flex items-center">
                        @if ($index !== 0)
                            <i class="fa-solid fa-chevron-right text-gray-400 text-xs mx-0.5"></i>
                        @else
                            <i class="fa-solid fa-home text-gray-400 mx-2 text-xs"></i>
                        @endif

                        @if ($breadcrumb['url'])
                            <a href="{{ $breadcrumb['url'] }}"
                                class="ms-1 inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                                {{ $breadcrumb['label'] }}
                            </a>
                        @else
                            <span class="ms-1 text-sm font-medium text-gray-700 dark:text-gray-400">
                                {{ $breadcrumb['label'] }}
                            </span>
                        @endif
                    </li>
                @endforeach
            </ol>
        </nav>
    @endif
</div>
