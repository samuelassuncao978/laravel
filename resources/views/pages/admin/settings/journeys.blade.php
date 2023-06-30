<div class="flex flex-col flex-grow overflow-hidden h-full">

    @if ($this->on('App\Http\Livewire\Admin\Journeys\Create'))
        @livewire('admin.journeys.create', $this->parameters('App\Http\Livewire\Admin\Journeys\Create'))
    @endif

    @if ($this->on('App\Http\Livewire\Admin\Journeys\Delete'))
        @livewire('admin.journeys.delete', $this->parameters('App\Http\Livewire\Admin\Journeys\Delete'))
    @endif

    @if ($this->on('App\Http\Livewire\Admin\Journeys\Edit'))
        @livewire('admin.journeys.edit', $this->parameters('App\Http\Livewire\Admin\Journeys\Edit'))
    @endif

    <div class="sm:px-7 -mb-0.5 px-4 relative z-10 flex items-center bg-gray-50 py-3 border-b border-gray-200">
        <div class="inline-block ml-auto">
            <x-ui.button.standard compact bold
                wire:click="{{ $this->opens('App\Http\Livewire\Admin\Journeys\Create') }}">
                Create Journey
            </x-ui.button.standard>
        </div>
    </div>

    <div class="scroll-shadow relative overflow-hidden h-full" x-data="scroll_shadow()" x-init="init()">
        <div class="overflow-y-scroll scrollbar scrollbar-thumb-gray-500 h-full" x-ref="content">
            @if (count($journeys ?? []) > 0)
                <div class="sm:p-7 p-4">
                    <x-ui.table>
                        @slot('columns')
                            <x-ui.table.column class="pt-5">Name</x-ui.table.column>
                            <x-ui.table.column class="pt-5"></x-ui.table.column>
                        @endslot
                        @slot('rows')
                            @foreach ($journeys as $key => $journey)
                                <tr class="hover:bg-blue-50 hover:bg-opacity-50 cursor-pointer"
                                    wire:click="{{ $this->opens('App\Http\Livewire\Admin\Journeys\Edit', ['journey' => $journey]) }}">
                                    <x-ui.table.cell>
                                        <span class="text-xs">
                                            {{ $journey->name }}
                                        </span>
                                    </x-ui.table.cell>
                                    <x-ui.table.cell collapse>
                                        <div class="flex">
                                            <x-ui.button.negative compact bold
                                                wire:click.stop="{{ $this->opens('App\Http\Livewire\Admin\Journeys\Delete', ['journey' => $journey]) }}">
                                                <span class="h-4 w-4">
                                                    <x-icon.solid icon="x" />
                                                </span>
                                            </x-ui.button.negative>
                                        </div>
                                    </x-ui.table.cell>
                                </tr>
                            @endforeach
                        @endslot
                    </x-ui.table>
                </div>
            @else
                <div class="h-full flex items-center justify-center">
                    @if (empty($this->search))
                        <x-common.empty-notice title="No journeys">
                            <x-icon.outline icon="identification" />
                        </x-common.empty-notice>
                    @else
                        <x-common.empty-notice title="No journeys found">
                            <x-icon.outline icon="identification" />
                        </x-common.empty-notice>
                    @endif
                </div>
            @endif
        </div>
    </div>
    <div class="mx-10 py-5 border-t border-gray-300 flex items-center">
        <div class="space-x-4 divide-x divide-gray-300 flex items-center text-xs text-gray-600">
            <div>{{ $journeys->total() }} Journeys</div>
        </div>
        <div class="ml-auto"> {{ $journeys->onEachSide(1)->links('components.ui.pagination') }} </div>
    </div>
</div>
