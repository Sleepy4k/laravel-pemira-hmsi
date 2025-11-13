<aside id="sidebar"
    class="w-64 flex-shrink-0 bg-white shadow-lg fixed lg:static inset-y-0 left-0 z-40 transform -translate-x-full lg:translate-x-0 transition-transform duration-300">
    <div class="h-full flex flex-col">
        <a href="{{ route('landing') }}"
            class="px-4 lg:px-8 py-3 flex items-center justify-center border-b border-neutral-200">
            <img src="{{ $appLogo }}" alt="Logo" width="30" height="30" loading="lazy" />
            <div class='m-1'></div>
            <span class="text-xl font-bold text-primary-500">{{ $appName }}</span>
        </a>

        <nav class="flex-1 space-y-2 p-4">
            <div class="text-center text-neutral-500 py-4" id="loader">Loading...</div>
            @foreach ($menus as $index => $menu)
                @if ($menu['is_header'])
                    <div id="sidebar-link" style="display: none;">
                        <h3 class="mt-6 mb-2 px-3 text-xs font-semibold text-neutral-400 uppercase tracking-wider">
                            {{ $menu['name'] }}
                        </h3>
                    </div>
                @else
                    <a href="{{ route($menu['route']) }}" id="sidebar-link" style="display: none;"
                        class="flex items-center space-x-3 rounded-lg p-3 text-body-lg font-semibold transition-colors {{ $currentUrl === route($menu['route']) ? $activeClasses : $inactiveClasses }}">
                        <box-icon name="{{ $menu['icon'] }}"></box-icon>
                        <span>{{ $menu['name'] }}</span>
                    </a>
                @endif
            @endforeach
        </nav>

        <div class="p-4 border-t border-neutral-200">
            <button id="logout-button"
                class="w-full text-left flex items-center space-x-3 rounded-lg p-3 text-body-md font-semibold text-neutral-700 hover:bg-error hover:text-white transition-all duration-200 cursor-pointer">
                <box-icon name='exit'></box-icon>
                <span>Logout</span>
            </button>
        </div>
    </div>
</aside>
