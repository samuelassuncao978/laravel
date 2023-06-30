<form wire:submit.prevent="save">
    <x-ui.modal.window>
        <x-modal.masthead title="Tag folder">
            @slot('information')
                <div>tag</div>
            @endslot
        </x-modal.masthead>
        <x-ui.modal.content>
            <div class="divide-y divide-gray-200">
                <div class="py-8 text-base leading-6 text-gray-700 sm:text-lg sm:leading-7 w-96">
                    <div class="flex flex-col space-y-1 bg-gray-100 border border-gray-200 p-3 rounded shadow-inner">
                        <button wire:click="$set('tag','')" type="button"
                            class="flex items-center text-xs text-gray-500 focus:outline-none rounded p-2 {{ empty($tag) ? 'bg-gray-200 font-bold' : '' }}">
                            <div
                                class="mr-2 rounded-full w-6 h-6 bg-gray-400 focus:outline-none ring-2 ring-transparent border-2 border-white">
                            </div>
                            Untagged
                        </button>
                        @foreach (auth()->user()->tags as $tag)
                            <button wire:key="$tag->id" wire:click="$set('tag','{{ $tag->id }}')" type="button"
                                class="flex items-center text-xs text-gray-500 focus:outline-none rounded p-2 {{ $this->tag === $tag->id ? 'bg-gray-200 font-bold' : '' }}">
                                <div
                                    class="mr-2 rounded-full w-6 h-6 {{ $tag->color }} focus:outline-none ring-2 ring-transparent border-2 border-white">
                                </div>
                                {{ $tag->name }}
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>
        </x-ui.modal.content>
        <x-ui.modal.actions>
            <span class="flex space-x-2">
                <x-button.secondary bold type="button" wire:click="close">Cancel</x-button.secondary>
                <x-button.positive bold type="submit">Save changes</x-button.positive>
            </span>
        </x-ui.modal.actions>
    </x-ui.modal.window>
</form>
