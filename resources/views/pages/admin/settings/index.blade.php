<div class="flex flex-grow">
    @include('pages.admin.settings.sidebar')
    <x-main>
        @if ('roles' === $this->pge()->loaded)
            <livewire:admin.settings.roles :key="'settings-roles'" />
        @elseif('account' === $this->pge()->loaded)
            <livewire:admin.settings.account :key="'settings-account'" />
        @elseif('intergrations' === $this->pge()->loaded)
            <livewire:admin.settings.intergrations :key="'settings-intergrations'" />
        @elseif('vouchers' === $this->pge()->loaded)
            <livewire:admin.settings.vouchers :key="'settings-vouchers'" />
        @elseif('appointment_types' === $this->pge()->loaded)
            <livewire:admin.settings.appointment-types :key="'settings-appointment_types'" />
        @elseif('appointment_methods' === $this->pge()->loaded)
            <livewire:admin.settings.appointment-methods :key="'settings-appointment_methods'" />
        @elseif('journeys' === $this->pge()->loaded)
            <livewire:admin.settings.journeys :key="'settings-journeys'" />
        @elseif('policies' === $this->pge()->loaded)
            <livewire:admin.settings.policies :key="'settings-policies'" />
        @elseif('appointments' === $this->pge()->loaded)
            <livewire:admin.settings.appointments :key="'settings-appointments'" />
        @elseif('billing' === $this->pge()->loaded)
            @livewire('admin.settings.billing',$this->pge()->parameters(),key('settings-billing'))
        @endif
    </x-main>
</div>
