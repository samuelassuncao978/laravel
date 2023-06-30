<x-sidebar>

    <div class="flex flex-col h-full">
        <div class="sticky top-0 z-10 bg-gray-100 border-b border-gray-200">
            <x-ui.sidebar.masthead text="Users">
                @slot('actions')
                    <button wire:click="{{ $this->opens('App\Http\Livewire\Admin\Users\Create') }}"
                        class="relative overflow-hidden focus:outline-none ml-auto text-xs flex items-center justify-center hover:bg-gray-600 hover:text-white rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd" />
                        </svg>
                        <div class="absolute inset-0 rounded overflow-hidden" wire:loading
                            wire:target="{{ $this->opens('App\Http\Livewire\Admin\Users\Create') }}">
                            <x-ui.loading-indicator :loading="true" bg="bg-gray-600 bg-opacity-80"
                                spinner="border-gray-50" />
                        </div>
                    </button>

                @endslot
            </x-ui.sidebar.masthead>
            <x-interface.sidebar.search />
        </div>

        <x-interface.sidebar.groups
            :groups="[['text'=>'active', 'action'=>'$set(\'group_by\',\'\')', 'active' => ($this->group_by === '') ],['text'=>'suspended', 'action'=>'$set(\'group_by\',\'suspended\')', 'active' => ($this->group_by === 'suspended') ],['text'=>'onboarding', 'action'=>'$set(\'group_by\',\'onboarding\')', 'active' => ($this->group_by === 'onboarding') ]]" />

        <x-interface.sidebar.item-list>
            @foreach ($users as $user)
                <x-ui.sidebar.item wire:key="{{ $user->id }}" wire:click="{!! $this->pge()->loads($user->id, ['user' => $user]) !!}"
                    :active="$user->id === $this->pge()->loaded">
                    <x-interface.sidebar.item-header heading="{{ $user->name }}" :subheading="$user->email"
                        :avatar="['name'=> $user->name, 'image' => optional($user->photo)->uri(true), 'color' => 'auto' ]" />
                    <div class="flex w-full text-xs divide-x divide-gray-300 text-gray-600">
                        <div class="flex items-center">
                            <x-ui.status text="Active" value="active" :options="['bg-purple-500' => 'active']" />
                        </div>
                        <div class="flex items-center text-gray-400 flex-grow  pl-2">
                            {{ $user->role }}
                        </div>
                    </div>
                </x-ui.sidebar.item>
            @endforeach
        </x-interface.sidebar.item-list>
        {{ $users->onEachSide(1)->links('components.ui.pagination-simple') }}
    </div>
</x-sidebar>
