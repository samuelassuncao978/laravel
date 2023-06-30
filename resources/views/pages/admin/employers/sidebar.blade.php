<x-sidebar>
    <div class="flex flex-col h-full">
        <div class="sticky top-0 z-10 bg-gray-100 border-b border-gray-200">
            <x-ui.sidebar.masthead text="Employers">
                @slot('actions')

                    <button wire:click="{{ $this->opens('App\Http\Livewire\Employers\Create') }}"
                        class="relative overflow-hidden focus:outline-none ml-auto text-xs flex items-center justify-center hover:bg-gray-600 hover:text-white rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd" />
                        </svg>
                        <div class="absolute inset-0 rounded overflow-hidden" wire:loading
                            wire:target="{{ $this->opens('App\Http\Livewire\Employers\Create') }}">
                            <x-ui.loading-indicator :loading="true" bg="bg-gray-600 bg-opacity-80"
                                spinner="border-gray-50" />
                        </div>
                    </button>

                @endslot
            </x-ui.sidebar.masthead>
            <x-interface.sidebar.search />

        </div>



        <x-interface.sidebar.item-list>
            @foreach ($employers as $employer)
                <x-ui.sidebar.item wire:key="{{ $employer->id }}" wire:click="{!! $this->pge()->loads($employer->id, ['employer' => $employer]) !!}"
                    :active="$employer->id === $this->pge()->loaded">
                    <x-interface.sidebar.item-header heading="{{ $employer->name }}"
                        :avatar="['name'=> $employer->name, 'color' => 'auto' ]" />
                    <div class="flex space-x-4 text-xs divide-x divide-gray-300 text-gray-600">
                        <div class="flex items-center">
                            <span class="h-4 w-4 mr-2">
                                <x-icon.solid icon="user" />
                            </span>
                            {{ $employer->clients->count() }}
                        </div>
                        <div class="flex items-center pl-4">
                            <span class="h-4 w-4 mr-2">
                                <x-icon.solid icon="calendar" />
                            </span>
                            {{ $employer->appointments()->count() }}
                        </div>
                    </div>
                </x-ui.sidebar.item>
            @endforeach
        </x-interface.sidebar.item-list>
        {{ $employers->onEachSide(1)->links('components.ui.pagination-simple') }}
    </div>
</x-sidebar>
