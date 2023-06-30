<form wire:submit.prevent="save">
    <x-ui.modal.window>
        <x-modal.masthead title="Assign homework">
            @slot('information')
                @if ($this->homework)
                    <div>
                        Homework:
                        <span class="text-blue-500">{{ $this->homework->name }}</span>
                    </div>
                @endif
                @if ($this->user)
                    <div>
                        User:
                        <span class="text-blue-500">{{ $this->user->name }}</span>
                    </div>
                @endif
            @endslot
        </x-modal.masthead>
        <x-ui.modal.content>
            <div class="scrollbar w-96" style="max-height:500px;">

                <div class="p-5">

                    <div class="flex h-60 border border-gray-300 rounded bg-white overflow-hidden text-xs">
                        <div class="flex flex-col flex-1 shadow-inner scrollbar space-y-2 p-2 pt-0">
                            <div
                                class="font-bold px-2 sticky top-0 pt-2 z-10 bg-white bg-opacity-50  backdrop-filter backdrop-blur-sm">
                                Clients</div>
                            @foreach (collect($clients)->filter(function ($i) use ($selected) {
        return !in_array($i->id, $selected);
    })
    as $client)
                                <label wire:key="{{ $client->id }}"
                                    class="flex p-2 bg-gray-50 relative rounded hover:bg-gray-100 select-none cursor-pointer">
                                    <span class="flex-grow">{{ $client->name }}</span>
                                    <input class="opacity-0 absolute inset-0" type="checkbox" name="selected[]"
                                        wire:model="selected" value="{{ $client->id }}" />
                                </label>
                            @endforeach
                        </div>
                        <div class="flex flex-col w-px bg-gray-300"></div>
                        <div class="flex flex-col flex-1 shadow-inner scrollbar space-y-2 p-2 pt-0">
                            <div
                                class="font-bold px-2 sticky top-0 pt-2 z-10 bg-white bg-opacity-50  backdrop-filter backdrop-blur-sm">
                                Assigned</div>
                            @foreach (collect($clients)->filter(function ($i) use ($selected) {
        return in_array($i->id, $selected);
    })
    as $client)
                                <label wire:key="{{ $client->id }}"
                                    class="flex p-2 bg-gray-50 relative rounded hover:bg-gray-100 select-none cursor-pointer">
                                    <span class="flex-grow">{{ $client->name }}</span>
                                    <input class="opacity-0 absolute inset-0" type="checkbox" name="selected[]"
                                        wire:model="selected" value="{{ $client->id }}" />
                                </label>
                            @endforeach
                        </div>
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
