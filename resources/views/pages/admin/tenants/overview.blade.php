<div class="flex flex-col">


    <div class="sm:px-7 px-4 relative z-10 flex items-center bg-gray-50 py-3 border-b border-gray-200">
        <div class="space-x-4 flex">
            <x-ui.button.standard compact type="button"
                wire:click="{{ $this->opens('App\Http\Livewire\Admin\Tenants\AccessDatabase', ['tenant' => $tenant]) }}">
                <span class="h-3 w-3 mr-2">
                    <x-icon.solid icon="database" />
                </span>
                Access database
            </x-ui.button.standard>
            <x-ui.button.standard compact type="button"
                wire:click="{{ $this->opens('App\Http\Livewire\Admin\Plans\Change', ['tenant' => $tenant]) }}">
                <span class="h-3 w-3 mr-2">
                    <x-icon.solid icon="view-boards" />
                </span>
                Plan
            </x-ui.button.standard>
            @if ($tenant->suspended_at)
                <x-ui.button.standard compact type="button"
                    wire:click="{{ $this->opens('App\Http\Livewire\Admin\Tenants\Unsuspend', ['tenant' => $tenant]) }}">
                    <span class="h-3 w-3 mr-2">
                        <x-icon.solid icon="shield-check" />
                    </span>
                    Unsuspend
                </x-ui.button.standard>
            @else
                <x-ui.button.standard compact type="button"
                    wire:click="{{ $this->opens('App\Http\Livewire\Admin\Tenants\Suspend', ['tenant' => $tenant]) }}">
                    <span class="h-3 w-3 mr-2">
                        <x-icon.solid icon="ban" />
                    </span>
                    Suspend
                </x-ui.button.standard>
            @endif
            @if ($tenant->maintenance_at)
                <x-ui.button.standard compact type="button"
                    wire:click="{{ $this->opens('App\Http\Livewire\Admin\Tenants\ExitMaintenance', ['tenant' => $tenant]) }}">
                    <span class="h-3 w-3 mr-2">
                        <x-icon.solid icon="shield-exclamation" />
                    </span>
                    Exit Maintenance
                </x-ui.button.standard>
            @else
                <x-ui.button.standard compact type="button"
                    wire:click="{{ $this->opens('App\Http\Livewire\Admin\Tenants\EnterMaintenance', ['tenant' => $tenant]) }}">
                    <span class="h-3 w-3 mr-2">
                        <x-icon.solid icon="shield-exclamation" />
                    </span>
                    Enter Maintenance
                </x-ui.button.standard>
            @endif
            <x-ui.button.negative compact type="button"
                wire:click="{{ $this->opens('App\Http\Livewire\Admin\Tenants\Delete', ['tenant' => $tenant]) }}">
                <span class="h-3 w-3 mr-2">
                    <x-icon.solid icon="trash" />
                </span>
                Delete
            </x-ui.button.negative>
        </div>

        <div class="inline-block ml-auto">
            <x-button.positive compact bold type="submit">
                Save changes
            </x-button.positive>
        </div>
    </div>


    @if ($this->on('App\Http\Livewire\Admin\Tenants\Delete'))
        @livewire('admin.tenants.delete', $this->parameters('App\Http\Livewire\Admin\Tenants\Delete'))
    @endif

    @if ($this->on('App\Http\Livewire\Admin\Tenants\Suspend'))
        @livewire('admin.tenants.suspend', $this->parameters('App\Http\Livewire\Admin\Tenants\Suspend'))
    @endif

    @if ($this->on('App\Http\Livewire\Admin\Tenants\Unsuspend'))
        @livewire('admin.tenants.unsuspend', $this->parameters('App\Http\Livewire\Admin\Tenants\Unsuspend'))
    @endif

    @if ($this->on('App\Http\Livewire\Admin\Tenants\EnterMaintenance'))
        @livewire('admin.tenants.enter-maintenance',
        $this->parameters('App\Http\Livewire\Admin\Tenants\EnterMaintenance'))
    @endif

    @if ($this->on('App\Http\Livewire\Admin\Tenants\ExitMaintenance'))
        @livewire('admin.tenants.exit-maintenance',
        $this->parameters('App\Http\Livewire\Admin\Tenants\ExitMaintenance'))
    @endif

    @if ($this->on('App\Http\Livewire\Admin\Plans\Change'))
        @livewire('admin.plans.change', $this->parameters('App\Http\Livewire\Admin\Plans\Change'))
    @endif

    @if ($this->on('App\Http\Livewire\Admin\Tenants\AccessDatabase'))
        @livewire('admin.tenants.access-database', $this->parameters('App\Http\Livewire\Admin\Tenants\AccessDatabase'))
    @endif

    @if ($this->on('App\Http\Livewire\Admin\Data\Import'))
        @livewire('data.import', $this->parameters('App\Http\Livewire\Admin\Tenants\Import'))
    @endif

</div>
