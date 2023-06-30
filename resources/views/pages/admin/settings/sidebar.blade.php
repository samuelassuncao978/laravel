<x-sidebar>

    <div class="flex flex-col h-full">
        <div class="sticky top-0 z-10 bg-gray-100 border-b border-gray-200">
            <x-ui.sidebar.masthead text="Settings" />
        </div>
        <x-interface.sidebar.item-list>

            <div class="">




        <x-ui.sidebar.list-item label=" Account" description="Manage your account"
                icon="users" wire:click="{!! $this->pge()->loads('account', []) !!}" :active="'account' === $this->pge()->loaded" />

            <x-ui.sidebar.list-item label="Billing" description="Mange your billing & payments" icon="cash"
                wire:click="{!! $this->pge()->loads('billing', []) !!}" :active="'billing' === $this->pge()->loaded" />

            <x-ui.sidebar.list-item label="Appointments" description="Appointment types & methods" icon="bookmark-alt"
                wire:click="{!! $this->pge()->loads('appointments', []) !!}" :active="'appointments' === $this->pge()->loaded" />


            <x-ui.sidebar.list-divider />

            <x-ui.sidebar.list-item label="Vouchers" description="Manage vouchers" icon="cash"
                wire:click="{!! $this->pge()->loads('vouchers', []) !!}" :active="'vouchers' === $this->pge()->loaded" />


            <x-ui.sidebar.list-item label="Notifications" description="Mange your notifications" icon="bell"
                wire:click="{!! $this->pge()->loads('notifications', []) !!}" :active="'notifications' === $this->pge()->loaded" />


            <x-ui.sidebar.list-item label="Journeys" description="Manage your journeys" icon="share"
                wire:click="{!! $this->pge()->loads('journeys', []) !!}" :active="'journeys' === $this->pge()->loaded" />


            <x-ui.sidebar.list-item label="Appearance" description="Manage your journeys" icon="photograph"
                wire:click="{!! $this->pge()->loads('appearance', []) !!}" :active="'appearance' === $this->pge()->loaded" />


            <x-ui.sidebar.list-item label="Intergrations" description="Manage your journeys" icon="puzzle"
                wire:click="{!! $this->pge()->loads('intergrations', []) !!}" :active="'intergrations' === $this->pge()->loaded" />



            <x-ui.sidebar.list-item label="Policies" description="Terms & privacy policy" icon="shield-check"
                wire:click="{!! $this->pge()->loads('policies', []) !!}" :active="'policies' === $this->pge()->loaded" />

            <div class="sticky top-0 z-10 bg-gray-100 border-b border-gray-200">
                <x-ui.sidebar.masthead text="Configuration" />
            </div>


            @if(user()->can('view-any', App\Models\Role::class))
                <x-ui.sidebar.list-item label="Roles" icon="identification"
                wire:click="{!! $this->pge()->loads('roles', []) !!}" :active="'roles' === $this->pge()->loaded" />
            @endif

            @if(user()->can('view-any', App\Models\AppointmentType::class))
                <x-ui.sidebar.list-item label="Appointment types" icon="color-swatch"
                        wire:click="{!! $this->pge()->loads('appointment_types', []) !!}" :active="'appointment_types' === $this->pge()->loaded" />
            @endif
            @if(user()->can('view-any', App\Models\AppointmentMethod::class))
                <x-ui.sidebar.list-item label="Appointment methods" icon="desktop-computer"
                        wire:click="{!! $this->pge()->loads('appointment_methods', []) !!}" :active="'appointment_methods' === $this->pge()->loaded" />
            @endif



    </div>

    </div>
    </x-interface.sidebar.item-list>



</x-sidebar>
