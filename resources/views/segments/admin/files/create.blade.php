<form wire:submit.prevent="save">
    <x-ui.modal.window>
        <x-modal.masthead title="Create file">
            @slot('information')

                @if ($this->user)
                    <div>
                        User:
                        <span class="text-blue-500">{{ $this->user->name }}</span>
                    </div>
                @endif
                @if ($this->client)
                    <div>
                        Client:
                        <span class="text-blue-500">{{ $this->client->name }}</span>
                    </div>
                @endif
                @if ($this->appointment)
                    <div>
                        Appointment:
                        <span class="text-blue-500">{{ optional($this->appointment->start_at)->format('H:i d-m') }}</span>
                    </div>
                @endif

            @endslot
        </x-modal.masthead>
        <x-ui.modal.content neat>


            @if (isset($errors))
                @error('server-error')
                    <div class="p-4 bg-red-50 border-b border-red-200 text-xs text-red-600">
                        <span class="max-w-sm block mx-auto">
                            {{ $message }}
                        </span>
                    </div>
                @enderror
            @endif

            <div class="divide-y divide-gray-200 px-10">
                <div class="py-8 text-base leading-6 text-gray-700 sm:text-lg sm:leading-7 w-96">
                    <div class="flex">
                        <x-ui.form.field type="file" name="file" label="File" required model="file" />
                    </div>
                    <div class="text-center text-xs text-gray-500">maximum upload size:
                        {{ human_filesize(
    auth()->guard('admin')->user()->upload_limit(),
) }}</div>
                </div>
            </div>
        </x-ui.modal.content>
        <x-ui.modal.actions>
            <span class="mr-auto">
                <x-button.secondary type="button" wire:click="close">Cancel</x-button.secondary>
            </span>
            <span class="flex space-x-2">
                <x-button.positive type="submit">Upload</x-button.positive>
            </span>
        </x-ui.modal.actions>
    </x-ui.modal.window>
</form>
