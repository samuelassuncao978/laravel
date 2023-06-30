<form wire:submit.prevent="save">
    <x-ui.modal.window>
        @if ($this->on('App\Http\Livewire\Admin\Leave\Create'))
            @livewire('admin.leave.create', $this->parameters('App\Http\Livewire\Admin\Leave\Create'))
        @endif

        @if ($this->on('App\Http\Livewire\Admin\Leave\Delete'))
            @livewire('admin.leave.delete', $this->parameters('App\Http\Livewire\Admin\Leave\Delete'))
        @endif

        @if ($this->on('App\Http\Livewire\Admin\Leave\Edit'))
            @livewire('admin.leave.edit', $this->parameters('App\Http\Livewire\Admin\Leave\Edit'))
        @endif

        <x-modal.masthead title="Availability">
            @slot('information')
                <div>Hours: <span class="text-blue-500">8</span></div>
                <div>Days: <span class="text-blue-500">8</span></div>
            @endslot
            @slot('actions')
                <button
                  wire:click="{{ $this->opens('App\Http\Livewire\Admin\Leave\Create', ['user' => auth()->guard('admin')->user() ]) }}"
                    class="rounded-full bg-gray-100 p-1 focus:outline-none hover:text-blue-500 text-gray-400 flex flex-shrink-0 px-2 items-center">
                    <span class="h-4 w-4 mr-1">
                        <x-icon.solid icon="plus" />
                    </span>
                    Add
                </button>
            @endslot

        </x-modal.masthead>
        <x-ui.modal.content neat>

            <div class="divide-y divide-gray-200 px-10">
                <div class="py-5">
                    Mon
                </div>
                <div class="py-5">
                    Tue
                </div>
                <div class="py-5">
                    Wed
                </div>
            </div>


        </x-ui.modal.content>
        <x-ui.modal.actions>
            <span class="mr-auto">
                <x-button.secondary type="button" wire:click="close">Cancel</x-button.secondary>
            </span>

        </x-ui.modal.actions>
    </x-ui.modal.window>
</form>
