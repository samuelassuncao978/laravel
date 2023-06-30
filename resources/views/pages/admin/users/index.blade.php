<div class="flex flex-grow">
    @include('pages.admin.users.sidebar')
    <x-main>
        @section('title')
            @parent
            <span class="flex items-center" :wire:key="now()">
                <span class="flex flex-col items-center mr-4 w-12 h-12">
                    <x-ui.avatar :name="$this->pge()->parameters('user')->name" rounded="rounded-sm" long />
                </span>
                <span>
                    {{ $this->pge()->parameters('user')->name }}
                </span>
            </span>
        @endsection

        @section('tabs')
            @parent
            <x-ui.tabs.tab :active="$this->tab()->loaded === 'profile'" wire:click="{!! $this->tab()->loads('profile', ['user' => $this->pge()->parameters('user')]) !!}">Profile
            </x-ui.tabs.tab>

            <x-ui.tabs.tab :active="$this->tab()->loaded === 'homework'" wire:click="{!! $this->tab()->loads('homework', ['user' => $this->pge()->parameters('user')]) !!}">Homework
            </x-ui.tabs.tab>
        @endsection

        @if ($this->on('App\Http\Livewire\Admin\Users\Create'))
            @livewire('admin.users.create', $this->parameters('App\Http\Livewire\Admin\Users\Create'))
        @endif

        @if ($this->tab()->loaded === 'profile')
            @livewire('admin.users.profile',$this->pge()->parameters(),key('profile-'.$this->pge()->parameters('user')->id))
        @elseif($this->tab()->loaded === 'vouchers')
            @livewire('admin.users.vouchers',$this->pge()->parameters(),key('vouchers-'.$this->pge()->parameters('user')->id))
        @elseif($this->tab()->loaded === 'homework')
            @livewire('admin.users.homeworks',$this->pge()->parameters(),key('homework-'.$this->pge()->parameters('user')->id))
        @endif

    </x-main>
</div>
