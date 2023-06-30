<div class="flex flex-grow">
    @include('pages.admin.employers.sidebar')

    <x-main>


        @if ($this->on('App\Http\Livewire\Employers\Create'))
            @livewire('admin.employers.create', $this->parameters('App\Http\Livewire\Employers\Create'))
        @endif

        @if ($employer->id)

            @section('title')
                @parent
                <span class="flex items-center" :wire:key="now()">
                    <span class="flex flex-col items-center mr-4 w-12 h-12">
                        <x-ui.avatar :name="$this->pge()->parameters('employer')->name" rounded="rounded-sm" long />
                    </span>
                    <span>
                        {{ $this->pge()->parameters('employer')->name }}
                    </span>
                </span>
            @endsection

            @section('tabs')
                @parent

                <x-ui.tabs.tab :active="$this->tab()->loaded === 'locations'" wire:click="{!! $this->tab()->loads('locations', ['employer' => $employer]) !!}">Locations
                </x-ui.tabs.tab>

                <x-ui.tabs.tab :active="$this->tab()->loaded === 'appointments'" wire:click="{!! $this->tab()->loads('appointments', ['employer' => $employer]) !!}">Appointments
                </x-ui.tabs.tab>

            @endsection

            @if($this->tab()->loaded === 'locations')
                @livewire('admin.employers.locations',$this->pge()->parameters(),key('locations-'.$this->pge()->parameters('employer')->id))
            @elseif($this->tab()->loaded === 'appointments')
                @livewire('admin.employers.appointments',$this->pge()->parameters(),key('appointments-'.$this->pge()->parameters('employer')->id))
            @endif

            
        @else
            <x-common.empty-notice title="No employers">
                <x-icon.solid icon="user-group" />
            </x-common.empty-notice>
        @endif
    </x-main>

</div>
