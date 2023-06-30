<div class="flex flex-grow">
    @include('pages.admin.clients.sidebar')

    <x-main>


        @if ($this->on('App\Http\Livewire\Clients\Create'))
            @livewire('admin.clients.create', $this->parameters('App\Http\Livewire\Clients\Create'))
        @endif

        @if ($client->id)

            @section('title')
                @parent
                <span class="flex items-center">
                    <span class="flex flex-col items-center mr-4 w-12 h-12">
                        <x-ui.avatar :name="$client->name" rounded="rounded-sm" long />
                    </span>
                    <span>
                        {{ $client->name }}
                    </span>
                </span>
            @endsection

            @section('tabs')
                @parent
                <x-ui.tabs.tab :active="$this->tab()->loaded === 'overview'" wire:click="{!! $this->tab()->loads('overview', ['client' => $client]) !!}">Overview
                </x-ui.tabs.tab>
                <x-ui.tabs.tab :active="$this->tab()->loaded === 'profile'" wire:click="{!! $this->tab()->loads('profile', ['client' => $client]) !!}">Profile
                </x-ui.tabs.tab>
                <x-ui.tabs.tab :active="$this->tab()->loaded === 'appointments'" wire:click="{!! $this->tab()->loads('appointments', ['client' => $client]) !!}">
                    Appointments</x-ui.tabs.tab>
                <x-ui.tabs.tab :active="$this->tab()->loaded === 'files'" wire:click="{!! $this->tab()->loads('files', ['client' => $client]) !!}">Files
                </x-ui.tabs.tab>
                <x-ui.tabs.tab :active="$this->tab()->loaded === 'notes'" wire:click="{!! $this->tab()->loads('notes', ['client' => $client]) !!}">Notes
                </x-ui.tabs.tab>
                <x-ui.tabs.tab :active="$this->tab()->loaded === 'billing'" wire:click="{!! $this->tab()->loads('billing', ['client' => $client]) !!}">Billing
                </x-ui.tabs.tab>
                <x-ui.tabs.tab :active="$this->tab()->loaded === 'communications'" wire:click="{!! $this->tab()->loads('communications', ['client' => $client]) !!}">
                    Communications</x-ui.tabs.tab>
            @endsection

            @if ($this->tab()->loaded === 'overview')
                @include('pages.clients.parts.overview')
            @elseif($this->tab()->loaded === 'profile')
                @livewire('admin.clients.profile',$this->pge()->parameters(),key('profile-'.$this->pge()->parameters('client')->id))
            @elseif($this->tab()->loaded === 'appointments')
                @livewire('admin.clients.appointments',$this->pge()->parameters(),key('appointments-'.$this->pge()->parameters('client')->id))
            @elseif($this->tab()->loaded === 'files')
                @livewire('admin.clients.files',$this->pge()->parameters(),key('files-'.$this->pge()->parameters('client')->id))
            @elseif($this->tab()->loaded === 'notes')
                @livewire('admin.clients.notes',$this->pge()->parameters(),key('notes-'.$this->pge()->parameters('client')->id))
            @endif

        @else
            <x-common.empty-notice title="No clients">
                <x-icon.solid icon="user-group" />
            </x-common.empty-notice>
        @endif
    </x-main>

</div>
