<form wire:submit.prevent="save">
    <x-ui.modal.window class="w-1/2">
        <x-modal.masthead title="Invoice">
            @slot('information')
                <div>Total: <span
                        class="text-blue-500">${{ number_format($invoice->subtotal() / 100, 2, '.', ' ') }}</span></div>
            @endslot
        </x-modal.masthead>
        <x-ui.modal.content neat>

            <x-ui.table>
                @slot('columns')
                    <x-ui.table.column class="pt-5 pl-10">Description</x-ui.table.column>
                    <x-ui.table.column class="pt-5">QTY</x-ui.table.column>
                    <x-ui.table.column class="pt-5 pr-10">Subtotal</x-ui.table.column>
                @endslot
                @slot('rows')
                    @foreach ($invoice->records as $record)
                        <tr class="hover:bg-blue-50 hover:bg-opacity-50 cursor-pointer">
                            <x-ui.table.cell>
                                <span class="text-xs pl-7">
                                    {{ $record->description }}
                                </span>
                            </x-ui.table.cell>
                            <x-ui.table.cell collapse>
                                <span class="text-xs">
                                    {{ $record->qty }}
                                </span>
                            </x-ui.table.cell>
                            <x-ui.table.cell collapse>
                                <span class="text-xs pr-10">
                                    ${{ number_format($record->subtotal / 100, 2, '.', ' ') }}
                                </span>
                            </x-ui.table.cell>
                        </tr>
                    @endforeach
                @endslot
            </x-ui.table>

        </x-ui.modal.content>
        <x-ui.modal.actions>
            <span class="flex space-x-2">
                <x-button.secondary bold type="button" wire:click="close">Cancel</x-button.secondary>
            </span>
        </x-ui.modal.actions>
    </x-ui.modal.window>
</form>
