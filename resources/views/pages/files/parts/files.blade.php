@foreach ($files as $file)
    <div wire:key="file-{{ $file->id }}" class="p-3 h-52 w-48">
        <x-ui.file wire:click="{{ $this->opens('App\Http\Livewire\Admin\Files\View', ['file' => $file]) }}"
            :name="$file->name" :mime="$file->mime" :size="$file->size" :orientation="$file->orientation"
            :preview="$file->thumbnail('sm')" :tag="$file->tags->first()">
            @slot('actions')
                <x-ui.context-menu.item
                    wire:click="{{ $this->opens('App\Http\Livewire\Admin\Files\Tag', ['file' => $file]) }}">
                    @slot('icon')
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                        </svg>
                    @endslot
                    Tag
                </x-ui.context-menu.item>
                <x-ui.context-menu.item
                    wire:click="{{ $this->opens('App\Http\Livewire\Admin\Files\Rename', ['file' => $file]) }}">
                    @slot('icon')
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    @endslot
                    Rename
                </x-ui.context-menu.item>
                <x-ui.context-menu.item
                    wire:click="{{ $this->opens('App\Http\Livewire\Admin\Files\Delete', ['file' => $file]) }}">
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
        </x-ui.file>
    </div>
@endforeach
