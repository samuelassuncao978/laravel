<form wire:submit.prevent="save">
    <x-ui.modal.window>
        <x-modal.masthead title="Share file">
            @slot('information')
                <div>Share</div>
            @endslot
        </x-modal.masthead>
        <x-ui.modal.content>
            <div class="divide-y divide-gray-200">
                <div class="py-8 text-base leading-6 text-gray-700 sm:text-lg sm:leading-7 w-96">
                    <div class="flex">
                        <x-ui.form.field type="select" name="type" label="To"
                            :options="[['text'=>'Clients','id'=>'clients'],['text'=>'Users','id'=>'users']]"
                            model="type" />
                    </div>
                    <div class="flex p-3">



                        <div class="flex flex-grow h-60 border border-gray-300 rounded bg-white overflow-hidden text-xs">
                            <div class="flex flex-col flex-1 shadow-inner scrollbar space-y-2 p-2 pt-0">
                                <div
                                    class="font-bold px-2 sticky top-0 pt-2 z-10 bg-white bg-opacity-50  backdrop-filter backdrop-blur-sm">
                                    {{ $type === 'clients' ? 'Clients:' : 'Users' }}</div>
                                @foreach (collect($with)->filter(function ($i) use ($selected) {
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
                                    Share with</div>
                                @foreach (collect($with)->filter(function ($i) use ($selected) {
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
            </div>
        </x-ui.modal.content>
        <x-ui.modal.actions>
            <span class="flex space-x-2">
                <x-button.secondary type="button" wire:click="close">Cancel</x-button.secondary>
                <x-button.positive type="submit">Share</x-button.positive>
            </span>
        </x-ui.modal.actions>
    </x-ui.modal.window>
</form>
