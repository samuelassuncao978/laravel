<form wire:submit.prevent="save">
    <x-ui.modal.window class="w-2/5">
        <x-modal.masthead title="Create intergration">
            @slot('information')
            @endslot
        </x-modal.masthead>
        <x-ui.modal.content neat>
            @if (isset($errors))
                @error('server-error')
                    <div class="p-4 bg-red-50 border-b border-red-200 text-xs text-red-600">
                        <span class="px-8 block">
                            {{ $message }}
                        </span>
                    </div>
                @enderror
            @endif

            <div class="divide-y divide-gray-200 px-10 h-96 flex">
                <x-ui.form.field type="textarea" name="intergration.manifest" label="Manifest" required model="manifest"
                    defer />
            </div>
        </x-ui.modal.content>
        <x-ui.modal.actions>
            <span class="mr-auto">
                <x-button.secondary type="button" wire:click="close">Cancel</x-button.secondary>
            </span>
            <span class="flex space-x-2">
                <x-button.positive bold type="submit">Add</x-button.positive>
            </span>
        </x-ui.modal.actions>
    </x-ui.modal.window>
</form>
