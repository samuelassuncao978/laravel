<div class="flex flex-grow">
    @include('pages.admin.tenants.sidebar')
    <x-main>
        @section('title')
            @parent
            <span class="flex items-center">
                <span class="flex flex-col items-center mr-4 w-12 h-12">
                    <x-ui.avatar :name="$this->pge()->parameters('tenant')->customer['company_name']" rounded="rounded-sm" long />
                </span>
                <span class="flex flex-col">
                    {{ $this->pge()->parameters('tenant')->customer['company_name'] }}
                    <span class="text-xs text-gray-500">
                         <a target="_blank" href="https://{{ $this->pge()->parameters('tenant')->domain }}" class="flex items-center hover:text-blue-500">

                        {{ $this->pge()->parameters('tenant')->domain }}
                            <span class="h-2 ml-1 w-2 ">
                           <x-icon.solid icon="link"/>
                           </span>
                        </a>
                    </span>
                </span>
            </span>
        @endsection


        @section('tabs')
            @parent
            <x-ui.tabs.tab :active="$this->tab()->loaded === 'overview'" wire:click="{!! $this->tab()->loads('overview', ['tenant' => $tenant]) !!}">Overview
            </x-ui.tabs.tab>
            <x-ui.tabs.tab :active="$this->tab()->loaded === 'invoices'" wire:click="{!! $this->tab()->loads('invoices', ['tenant' => $tenant]) !!}">Invoices
            </x-ui.tabs.tab>
            <x-ui.tabs.tab :active="$this->tab()->loaded === 'settings'" wire:click="{!! $this->tab()->loads('settings', ['tenant' => $tenant]) !!}">Settings
            </x-ui.tabs.tab>
            <x-ui.tabs.tab :active="$this->tab()->loaded === 'plugins'" wire:click="{!! $this->tab()->loads('plugins', ['tenant' => $tenant]) !!}">Plugins
            </x-ui.tabs.tab>
            <x-ui.tabs.tab :active="$this->tab()->loaded === 'jobs'" wire:click="{!! $this->tab()->loads('jobs', ['tenant' => $tenant]) !!}">Jobs
            </x-ui.tabs.tab>
            <x-ui.tabs.tab :active="$this->tab()->loaded === 'logs'" wire:click="{!! $this->tab()->loads('logs', ['tenant' => $tenant]) !!}">Logs
            </x-ui.tabs.tab>
        @endsection



        @if ($this->on('App\Http\Livewire\Admin\Tenants\Create'))
            @livewire('admin.tenants.create', $this->parameters('App\Http\Livewire\Admin\Tenants\Create'))
        @endif

        @if ($this->tab()->loaded === 'overview')
            @livewire('admin.tenants.overview',$this->pge()->parameters(),key('overview-'.$this->pge()->parameters('tenant')->id))
        @elseif($this->tab()->loaded === 'invoices')
            @livewire('admin.tenants.invoices',$this->pge()->parameters(),key('invoices-'.$this->pge()->parameters('tenant')->id))
        @elseif($this->tab()->loaded === 'plugins')
            @livewire('admin.tenants.plugins',$this->pge()->parameters(),key('plugins-'.$this->pge()->parameters('tenant')->id))
        @elseif($this->tab()->loaded === 'settings')
            @livewire('admin.tenants.settings',$this->pge()->parameters(),key('settings-'.$this->pge()->parameters('tenant')->id))
        @elseif($this->tab()->loaded === 'logs')
            @livewire('admin.tenants.logs',$this->pge()->parameters(),key('logs-'.$this->pge()->parameters('tenant')->id))
        @endif
    </x-main>
</div>
