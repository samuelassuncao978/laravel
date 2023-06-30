<div class="flex flex-col flex-grow overflow-hidden h-full">


    @if ($this->on('App\Http\Livewire\Admin\Invoices\View'))
        @livewire('admin.invoices.view', $this->parameters('App\Http\Livewire\Admin\Invoices\View'))
    @endif


    <div class="sm:px-7 -mb-0.5 px-4 relative z-10 flex items-center bg-gray-50 py-3 border-b border-gray-200">

        <div class="space-x-4 divide-x divide-gray-300 flex items-center text-xs text-gray-600">
            <x-ui.action-bar.find label="Find:" />
        </div>

    </div>



    <div class="scroll-shadow relative overflow-hidden h-full" x-data="scroll_shadow()" x-init="init()">
        <div class="overflow-y-scroll scrollbar scrollbar-thumb-gray-500 h-full" x-ref="content">
            @if (count($invoices ?? []) > 0)
                <div class="sm:p-7 p-4">
                    <x-ui.table>
                        @slot('columns')
                            <x-ui.table.column class="pt-5">Invoice</x-ui.table.column>
                            <x-ui.table.column class="pt-5">Subtotal</x-ui.table.column>
                            <x-ui.table.column class="pt-5">Status</x-ui.table.column>
                        @endslot
                        @slot('rows')
                            @foreach ($invoices as $key => $invoice)
                                <tr class="hover:bg-blue-50 hover:bg-opacity-50 cursor-pointer"
                                    wire:click="{{ $this->opens('App\Http\Livewire\Admin\Invoices\View', ['invoice' => $invoice]) }}">
                                    <x-ui.table.cell collapse>
                                        <span class="text-xs">
                                            {{ $invoice->created_at->format('Y-m-d') }}
                                        </span>
                                    </x-ui.table.cell>
                                    <x-ui.table.cell collapse>
                                        <span class="text-xs">
                                            ${{ number_format($invoice->subtotal() / 100, 2, '.', ' ') }}
                                        </span>
                                    </x-ui.table.cell>
                                    <x-ui.table.cell collapse>
                                        <span class="text-xs">

                                        </span>
                                    </x-ui.table.cell>
                                </tr>
                            @endforeach
                        @endslot
                    </x-ui.table>
                </div>
            @else
                <div class="h-full flex items-center justify-center">
                    @if (empty($this->search))
                        <x-common.empty-notice title="No settings">
                            <x-icon.outline icon="cog" />
                        </x-common.empty-notice>
                    @else
                        <x-common.empty-notice title="No settings found">
                            <x-icon.outline icon="cog" />
                        </x-common.empty-notice>
                    @endif
                </div>
            @endif
        </div>
    </div>
    <div class="mx-10 py-5 border-t border-gray-300 flex items-center">
        <div class="space-x-4 divide-x divide-gray-300 flex items-center text-xs text-gray-600">
            <div>{{ $invoices->total() }} Invoices</div>
        </div>
        <div class="ml-auto"> {{ $invoices->onEachSide(1)->links('components.ui.pagination') }} </div>
    </div>
</div>
