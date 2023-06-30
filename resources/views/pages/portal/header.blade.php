<div x-data="{active:false}" class=" pb-0 pt-10 flex relative z-20 items-center">
    <style>
        .bg {
            /* background-color: #ffffff; */
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='80' height='80' viewBox='0 0 80 80'%3E%3Cg fill='%23ac9d92' fill-opacity='0.13'%3E%3Cpath fill-rule='evenodd' d='M11 0l5 20H6l5-20zm42 31a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM0 72h40v4H0v-4zm0-8h31v4H0v-4zm20-16h20v4H20v-4zM0 56h40v4H0v-4zm63-25a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm10 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM53 41a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm10 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm10 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-30 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-28-8a5 5 0 0 0-10 0h10zm10 0a5 5 0 0 1-10 0h10zM56 5a5 5 0 0 0-10 0h10zm10 0a5 5 0 0 1-10 0h10zm-3 46a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm10 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM21 0l5 20H16l5-20zm43 64v-4h-4v4h-4v4h4v4h4v-4h4v-4h-4zM36 13h4v4h-4v-4zm4 4h4v4h-4v-4zm-4 4h4v4h-4v-4zm8-8h4v4h-4v-4z'/%3E%3C/g%3E%3C/svg%3E");

        }

    </style>
    <img src="{{ asset('images/logo.png') }}" class="z-30 h-10" alt="">
    <div :class="{'hidden':!active}"
        class="md:ml-auto md:space-x-10 items-center justify-center text-gray-600 flex flex-col md:flex md:flex-row fixed md:relative inset-0 bg-gray-100 md:bg-transparent">
        @if (auth()->guard('client')->check())
            <a href="/portal" class="flex items-center font-bold ">
                Home
            </a>
            <a href="/portal/homework" class="flex items-center font-bold ">
                Homework
            </a>
            <a href="/portal/appointments" class="flex items-center font-bold ">
                Appointments
            </a>
            <!-- <a href="#" class="flex items-center font-bold text-gray-700 hover:text-orange-500" wire:click.prevent="goto('home')">
                    Personal details
                </a> -->
            <button wire:click="{{ $this->opens('App\Http\Livewire\Portal\Authentication\Logout') }}"
                class="focus:outline-none flex items-center font-bold text-gray-700 hover:text-orange-500">
                <span class="h-4 w-4 mr-2">
                    <x-icon.solid icon="save" />
                </span>
                Logout
            </button>
        @endif

    </div>
    <button x-on:click="active = !active"
        class="ml-auto md:hidden  mr-5 relative z-30 focus:outline-none flex items-center text-gray-500 justify-center rounded bg-gray-50 w-10 h-10">
        <span class="h-6 w-6">
            <x-icon.solid icon="view-list" />
        </span>
    </button>

    @if ($this->on('App\Http\Livewire\Portal\Authentication\Logout'))
        @livewire('portal.authentication.logout', $this->parameters('App\Http\Livewire\Portal\Authentication\Logout'))
    @endif

</div>
