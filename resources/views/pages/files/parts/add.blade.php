<div class="p-3 h-48 w-48 m-4 flex flex-col space-y-2  rounded">
    <button
        class="flex h-full relative focus:outline-none bg-gray-50 flex-col overflow-hidden hover:bg-gray-100 rounded-lg focus:bg-gray-50 focus:ring-2 ring-gray-100"
        wire:click="{{ $this->opens('App\Http\Livewire\Admin\Files\Create', [
    'parent' => $parent,
    'user' => auth()->guard('admin')->user(),
]) }}">
        <div class="h-full w-full  flex flex-col items-center justify-center relative text-gray-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mb-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                    clip-rule="evenodd" />
            </svg>
            Add files
        </div>

        <div class="absolute inset-0 rounded overflow-hidden" wire:loading
            wire:target="{{ $this->opens('App\Http\Livewire\Admin\Files\Create', [
    'parent' => $parent,
    'user' => auth()->guard('admin')->user(),
]) }}">
            <x-ui.loading-indicator :loading="true" bg="bg-gray-50 bg-opacity-80" spinner="border-gray-600" />
        </div>

    </button>
    <span class="text-center uppercase tracking-wide text-gray-400 font-light text-xs">or</span>
    <button
        class="flex flex-col relative focus:outline-none  bg-gray-50 overflow-hidden hover:bg-gray-100 rounded-lg focus:bg-gray-50 focus:ring-2 ring-gray-100"
        wire:click="{{ $this->opens('App\Http\Livewire\Admin\Folders\Create', ['parent' => $parent]) }}" id="CreateFolder">
        <div class=" p-3 h-full w-full  rounded flex items-center justify-center relative text-gray-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z"
                    clip-rule="evenodd" />
                <path d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z" />
            </svg>
            New folder
        </div>
        <div class="absolute inset-0 rounded overflow-hidden" wire:loading
            wire:target="{{ $this->opens('App\Http\Livewire\Admin\Folders\Create', ['parent' => $parent]) }}">
            <x-ui.loading-indicator :loading="true" bg="bg-gray-50 bg-opacity-80" spinner="border-gray-600" />
        </div>
    </button>
</div>
