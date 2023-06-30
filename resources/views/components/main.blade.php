<div class="flex-grow flex flex-col bg-white overflow-y-auto relative">
    @if (isset($action))
        <form class="flex-grow flex flex-col bg-white overflow-y-auto relative" action="{{ $action }}"
            method="{{ isset($method) ? (in_array($method ?? null, ['DELETE', 'PUT', 'PATCH']) ? 'POST' : $method) : 'GET' }}">
            @csrf
            @if (in_array($method ?? null, ['DELETE', 'PUT', 'PATCH']))
                @method($method)
            @endif
            <x-interface.ribbon />
            @if (session()->has('message'))

                <div x-data="{ open: true }" x-cloak x-show="open"
                    class="shadow-lg rounded-lg bg-white mx-auto m-8 p-4 absolute right-5 top-0 flex z-50 max-w-sm">
                    <div
                        class="pr-2 {{ is_array(Session::get('message')) ? (Session::get('message')[0] === 'success' ? 'text-green-500' : 'text-red-500') : '' }}">
                        <svg class="w-6 sm:w-5 h-6 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <div class="text-sm pb-2">
                            @if (is_array(Session::get('message')))
                                {{ optional(Session::get('message'))[1] }}
                            @endif
                            <span class="float-right">
                                <button class="bg-gray-200 p-2 rounded-full" @click="open = !open">
                                    <svg class="h-3 w-3 fill-current" viewBox="0 0 20 20">
                                        <path
                                            d="M10 8.586L2.929 1.515 1.515 2.929 8.586 10l-7.071 7.071 1.414 1.414L10 11.414l7.071 7.071 1.414-1.414L11.414 10l7.071-7.071-1.414-1.414L10 8.586z" />
                                    </svg>
                                </button>
                            </span>
                        </div>
                        <div class="text-sm text-gray-600  tracking-tight ">
                            @if (is_array(Session::get('message')))
                                {{ optional(Session::get('message'))[2] }}
                            @else
                                {{ Session::get('message') }}
                            @endif
                        </div>
                    </div>
                </div>
            @endif
            {{ $slot }}
        </form>
    @else
        <x-interface.ribbon />
        @if (session()->has('message'))

            <div x-data="{ open: true }" x-cloak x-show="open"
                class="shadow-lg rounded-lg bg-white mx-auto m-8 p-4 absolute right-5 top-0 flex z-50 max-w-sm">
                <div
                    class="pr-2 {{ is_array(Session::get('message')) ? (Session::get('message')[0] === 'success' ? 'text-green-500' : 'text-red-500') : '' }}">
                    <svg class="w-6 sm:w-5 h-6 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <div class="text-sm pb-2">
                        @if (is_array(Session::get('message')))
                            {{ optional(Session::get('message'))[1] }}
                        @endif
                        <span class="float-right">
                            <button class="bg-gray-200 p-2 rounded-full" @click="open = !open">
                                <svg class="h-3 w-3 fill-current" viewBox="0 0 20 20">
                                    <path
                                        d="M10 8.586L2.929 1.515 1.515 2.929 8.586 10l-7.071 7.071 1.414 1.414L10 11.414l7.071 7.071 1.414-1.414L11.414 10l7.071-7.071-1.414-1.414L10 8.586z" />
                                </svg>
                            </button>
                        </span>
                    </div>
                    <div class="text-sm text-gray-600  tracking-tight ">
                        @if (is_array(Session::get('message')))
                            {{ optional(Session::get('message'))[2] }}
                        @else
                            {{ Session::get('message') }}
                        @endif
                    </div>
                </div>
            </div>
        @endif
        {{ $slot }}
    @endif

</div>
