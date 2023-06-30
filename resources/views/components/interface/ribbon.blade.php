@if (View::hasSection('commands') || View::hasSection('hud') || View::hasSection('options') || trim($__env->yieldContent('title')) || View::hasSection('tabs'))
    <div class="border-b border-gray-200  flex flex-col w-full bg-white sticky top-0">
        @if (View::hasSection('commands') || View::hasSection('hud') || View::hasSection('options') || View::hasSection('title'))
            <div class="sm:px-7 sm:pt-7 px-4 pt-4 flex w-full items-center pb-5">
                @if (trim($__env->yieldContent('title')))
                    <div class="flex items-center text-3xl text-gray-900">
                        @yield('title')
                    </div>
                @endif
                @if (View::hasSection('commands') || View::hasSection('hud') || View::hasSection('options'))
                    <div class="ml-auto sm:flex hidden items-center justify-end">
                        @hasSection('commands')
                            <div class="flex items-center">
                                @yield('commands')
                            </div>
                @endif
                @hasSection('hud')
                    @yield('hud')
        @endif
        @hasSection('options')
            <div x-data="{ open: false }" class="relative z-30">
                <button @click="open = !open" :class="{ 'ring-2 ring-blue-500': open }"
                    class="focus:outline-none w-8 h-8 ml-4 text-gray-400 shadow rounded-full flex items-center justify-center border border-gray-200 dark:border-gray-700">
                    <svg viewBox="0 0 24 24" class="w-4" stroke="currentColor" stroke-width="2" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="1"></circle>
                        <circle cx="19" cy="12" r="1"></circle>
                        <circle cx="5" cy="12" r="1"></circle>
                    </svg>
                </button>
                <div @click.away="open = false" x-cloak x-show="open"
                    class="absolute right-0 mt-2 py-2 w-48 bg-white rounded-md shadow-xl z-30">
                    @yield('options')
                </div>
            </div>
@endif
</div>
@endif
</div>
@endif
@hasSection('tabs')
    <div class="sm:px-7 -mb-0.5 relative z-20 px-4 flex items-center space-x-3 sm:mt-7 mt-4 border-b border-gray-200">
        @yield('tabs')
    </div>
@endif
@hasSection('actions')
    <div class="sm:px-7 -mb-0.5 px-4 relative z-10 flex items-center bg-gray-50 py-3 border-b border-gray-200">
        @yield('actions')
    </div>
@endif
</div>
@endif
