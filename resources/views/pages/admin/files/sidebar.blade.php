<div class="flex flex-col h-full">
    <div class="sticky top-0 z-10 bg-gray-100 border-b border-gray-200">
        <x-ui.sidebar.masthead text="Files" />
        <x-interface.sidebar.search />
    </div>
    <x-interface.sidebar.item-list>

        <x-ui.sidebar.list-heading>Locations</x-ui.sidebar.list-heading>
        <div>
            <x-ui.sidebar.list-item label="My files" icon="collection" :count="$file_count"
                :active="$this->pge()->loaded === 'App\Http\Livewire\Admin\Files\Mine'"
                wire:click="{!! $this->pge()->loads('App\Http\Livewire\Admin\Files\Mine') !!}" />
            <x-ui.sidebar.list-item label="Client Files" icon="users" :count="$client_file_count"
                :active="$this->pge()->loaded === 'App\Http\Livewire\Admin\Files\ClientFiles'"
                wire:click="{!! $this->pge()->loads('App\Http\Livewire\Admin\Files\ClientFiles') !!}" />
            <x-ui.sidebar.list-divider />

            <!-- <x-ui.sidebar.list-item label="Shared with me" icon="share" :count="12" :active="$this->pge()->loaded === 'App\Http\Livewire\Admin\Files\Shared'" wire:click="{!! $this->pge()->loads('App\Http\Livewire\Admin\Files\Shared') !!}"/> -->


        </div>
        <x-ui.sidebar.list-heading>
            Tags
            <button wire:click="{{ $this->opens('App\Http\Livewire\Admin\Tags\Create') }}"
                class="relative overflow-hidden focus:outline-none ml-auto mr-1 text-xs flex items-center justify-center hover:bg-gray-600 hover:text-white rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                        clip-rule="evenodd" />
                </svg>

                <div class="absolute inset-0 rounded overflow-hidden" wire:loading
                    wire:target="{{ $this->opens('App\Http\Livewire\Admin\Tags\Create') }}">
                    <x-ui.loading-indicator :loading="true" bg="bg-gray-600 bg-opacity-80" spinner="border-gray-50" />
                </div>
            </button>
        </x-ui.sidebar.list-heading>

        <div class="space-y-1">
            @foreach (auth()->user()->tags as $tag)
                <x-ui.sidebar.list-item :wire-key="$tag->id" :label="$tag->name" :count="$tag->items()"
                    :active="$this->pge()->loaded === $tag->id"
                    :active="$this->pge()->loaded === 'App\Http\Livewire\Admin\Files\Tagged' && $this->pge()->parameters('tag')->id === $tag->id"
                    wire:click="{!! $this->pge()->loads('App\Http\Livewire\Admin\Files\Tagged', ['tag' => $tag]) !!}">
                    @slot('icon')
                        <span class="h-5 w-5 relative flex items-center justify-center">
                            <x-icon.outline icon="tag" />
                            <span class="h-1.5 w-1.5 {{ $tag->color }} rounded-sm transform rotate-45 absolute"></span>
                        </span>
                    @endslot
                    @slot('actions')
                        <x-ui.context-menu.item
                            wire:click="{{ $this->opens('App\Http\Livewire\Admin\Tags\Edit', ['tag' => $tag]) }}">
                            @slot('icon')
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            @endslot
                            Edit
                        </x-ui.context-menu.item>
                        <x-ui.context-menu.item
                            wire:click="{{ $this->opens('App\Http\Livewire\Admin\Tags\Delete', ['tag' => $tag]) }}">
                            @slot('icon')
                                <svg xmlns="http://www.w3.org/2000/svg" class="text-red-500 group-hover:text-white" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            @endslot
                            Delete
                        </x-ui.context-menu.item>
                    @endslot
                </x-ui.sidebar.list-item>
            @endforeach
        </div>


    </x-interface.sidebar.item-list>


    <div class="p-5">
        @php
            $circumference = 50 * 2 * pi() - 35;
            $percent = round(($usage['used'] / $usage['allocated']) * 100);

        @endphp


        <div class="flex space-x-4 bg-white bg-opacity-50 rounded shadow-sm p-2 pr-4">


            <div class="relative w-12 h-12">
                <div
                    class="absolute h-full w-full flex items-center justify-center top-1/2 rounded-full left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                    <div class="rounded-full h-10 w-10 text-xs text-gray-600 p-2 flex justify-center items-center"
                        style="font-size:0.7rem;">
                        <span>{{ $percent }}</span><span style="font-size:0.5rem;">%</span>
                    </div>
                </div>
                <svg class="absolute z-20 inset-0 text-blue-500" viewBox="0 0 100 100">
                    <circle class="text-gray-300" stroke-width="10" stroke="currentColor" fill="transparent" r="45"
                        cx="50" cy="50" />
                    <circle stroke-width="10" stroke-dasharray="{{ $circumference }}"
                        stroke-dashoffset="{{ $circumference - ($percent / 100) * $circumference }}"
                        stroke-linecap="round" stroke="currentColor" fill="transparent" r="45" cx="50" cy="50" />
                </svg>
            </div>

            <div class="flex flex-col flex-grow justify-center space-y-2 text-xs text-gray-700">
                <div class="flex">
                    <span class="uppercase  font-normal text-gray-500">Used:</span>
                    <span class="ml-auto">{{ human_filesize($usage['used'] ?? 0) }}</span>
                </div>
                <div class="flex">
                    <span class="uppercase font-normal  text-gray-500">Available:</span>
                    <span class="ml-auto">{{ human_filesize($usage['available'] ?? 0) }}</span>
                </div>
            </div>

        </div>
    </div>

</div>
