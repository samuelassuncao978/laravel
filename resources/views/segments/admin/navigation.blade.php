<div x-data="{ open: false }" :class="{'bg-blue-500':open }"
    class="bg-white  text-white md:text-gray-400 transition-colors ease-in duration-500 flex-shrink-0 border-r border-gray-200 flex-col flex z-10 fixed w-full md:w-20 md:relative shadow md:shadow-none">
    <div @click="open=!open" :class="{'text-white':open, 'text-blue-500':!open }"
        class="text-blue-500 my-2 z-50  transition-colors ease-in duration-500 md:my-5  flex items-center justify-center">
        <div class="w-full h-10 md:h-12">
            <x-logo />
        </div>
    </div>
    <div :class="{'-translate-y-full': !open, 'translate-y-0':open }"
        class="bg-blue-500 md:bg-white pt-12 md:pt-0 md:-translate-y-0 -translate-y-full absolute md:relative flex transform transition-all duration-500 ease-in-out w-full flex-grow md:mt-4 flex-row md:flex-col md:space-y-4 md:flex flex-wrap">
        <x-interface.navigation-item :active="request()->is('admin')" href="/admin">
            <x-icon.solid icon="home" />
            <span class="flex md:hidden">Dashboard</span>
        </x-interface.navigation-item>


        @if(user()->can('view-any', App\Models\Appointment::class))
        <div class="opacity-30 pointer-events-none">
            <x-interface.navigation-item :active="request()->is('admin/appointments*')" href="/admin/appointments">
                <x-icon.solid icon="clock" />
                <span class="flex md:hidden">Appointments</span>
            </x-interface.navigation-item>
        </div>
        @endif

        @if(user()->can('view-any', App\Models\Client::class))
        <x-interface.navigation-item :active="request()->is('admin/clients*')" href="/admin/clients">
            <x-icon.solid icon="user-circle" />
            <span class="flex md:hidden">Clients</span>
        </x-interface.navigation-item>
        @endif

        @if(user()->can('view-any', App\Models\Employer::class))
        <x-interface.navigation-item :active="request()->is('admin/employers*')" href="/admin/employers">
            <x-icon.solid icon="office-building" />
            <span class="flex md:hidden">Employers</span>
        </x-interface.navigation-item>
        @endif

        @if(user()->can('view-any', App\Models\Calendar::class))
        <x-interface.navigation-item :active="request()->is('admin/calendar*')" href="/admin/calendar">
            <x-icon.solid icon="calendar" />
            <span class="flex md:hidden">Calendar</span>
        </x-interface.navigation-item>
        @endif

        @if(user()->can('view-any', App\Models\File::class))
        <x-interface.navigation-item :active="request()->is('admin/files*')" href="/admin/files">
            <x-icon.solid icon="collection" />
            <span class="flex md:hidden">Files</span>
        </x-interface.navigation-item>
        @endif

        @if(user()->can('view-any', App\Models\Note::class))
        <div class="opacity-30 pointer-events-none">
            <x-interface.navigation-item :active="request()->is('admin/notes*')" href="/admin/notes">
                <x-icon.solid icon="document-text" />
                <span class="flex md:hidden">Notes</span>
            </x-interface.navigation-item>
        </div>
        @endif

        @if(user()->can('view-any', App\Models\User::class))
        <x-interface.navigation-item :active="request()->is('admin/users*')" href="/admin/users">
            <x-icon.solid icon="users" />
            <span class="flex md:hidden">Users</span>
        </x-interface.navigation-item>
        @endif

        <x-interface.navigation-item :active="request()->is('admin/reports*')" href="/admin/reports">
            <x-icon.solid icon="presentation-chart-line" />
            <span class="flex md:hidden">Reports</span>
        </x-interface.navigation-item>

        @if(user()->can('view-any', App\Models\Setting::class))
        <x-interface.navigation-item :active="request()->is('admin/settings*')" href="/admin/settings">
            <x-icon.solid icon="cog" />
            <span class="flex md:hidden">Settings</span>
        </x-interface.navigation-item>
        @endif

        @if(user()->can('view-any', App\Models\Tenant::class))
        <x-interface.navigation-item :active="request()->is('admin/tenants*')" href="/admin/tenants">
            <x-icon.solid icon="cube" />
            <span class="flex md:hidden">Tenants</span>
        </x-interface.navigation-item>
        @endif




    </div>
    <button wire:click="{{ $this->opens('App\Http\Livewire\Admin\Authentication\Logout') }}" type="button"
        class="mb-3 focus:outline-none h-10 w-full rounded-md flex items-center justify-center hover:text-blue-500">
        <span class="h-5 w-5">
            <x-icon.solid icon="login" />
        </span>
    </button>
    @if ($this->on('App\Http\Livewire\Admin\Authentication\Logout'))
        @livewire('admin.authentication.logout', $this->parameters('App\Http\Livewire\Admin\Authentication\Logout'))
    @endif

</div>
