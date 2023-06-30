<div class="flex flex-col flex-grow overflow-hidden h-full">
    @if ($this->on('App\Http\Livewire\Admin\Employers\Locations\Create'))
        @livewire('admin.employers.locations.create',
        $this->parameters('App\Http\Livewire\Admin\Employers\Locations\Create'))
    @endif

    @if ($this->on('App\Http\Livewire\Admin\Employers\Locations\Delete'))
        @livewire('admin.employers.locations.delete',
        $this->parameters('App\Http\Livewire\Admin\Employers\Locations\Delete'))
    @endif

    @if ($this->on('App\Http\Livewire\Admin\Employers\Locations\Edit'))
        @livewire('admin.employers.locations.edit',
        $this->parameters('App\Http\Livewire\Admin\Employers\Locations\Edit'))
    @endif




    <div class="sm:px-7 -mb-0.5 px-4 relative z-10 flex items-center bg-gray-50 py-3 border-b border-gray-200">
        <div class="inline-block ml-auto">
            <x-ui.button.standard compact bold
                wire:click="{{ $this->opens('App\Http\Livewire\Admin\Employers\Locations\Create', ['employer' => $employer]) }}">
                Create location
            </x-ui.button.standard>
        </div>
    </div>
    <div class="scroll-shadow relative overflow-hidden h-full" x-data="scroll_shadow()" x-init="init()">
        <div class="overflow-y-scroll scrollbar scrollbar-thumb-gray-500 h-full" x-ref="content">
            @if (count($locations ?? []) > 0)
                <div class="sm:p-7 p-4">
                    <x-ui.table>
                        @slot('columns')

                            <x-ui.table.column class="pt-5">Location</x-ui.table.column>
                            <x-ui.table.column class="pt-5"></x-ui.table.column>
                            <x-ui.table.column class="pt-5"></x-ui.table.column>
                        @endslot
                        @slot('rows')
                            @foreach ($locations as $key => $employerlocation)
                                <tr class="hover:bg-blue-50 hover:bg-opacity-50 cursor-pointer"
                                    wire:click="{{ $this->opens('App\Http\Livewire\Admin\Employers\Locations\Edit', ['employerlocation' => $employerlocation]) }}">

                                    <x-ui.table.cell>
                                        <span class="text-xs">
                                            {{ $employerlocation->name }}
                                        </span>
                                    </x-ui.table.cell>
                                    <x-ui.table.cell collapse>
                                        <span class="flex items-center" x-on:click="$event.stopPropagation()">
                                            <span
                                                class="text-xs w-40 flex mr-2 px-2 py-1 group  hover:bg-blue-500 hover:text-white rounded">
                                                <span class="select-all truncate">{{ $employerlocation->id }}</span>
                                                <span class="h-4 w-4 ml-1 flex-shrink-0 hidden group-hover:flex"><x-icon.solid icon="clipboard-copy"/></span>
                                            </span>

                                            <x-button.secondary compact
                                                href="/portal/register?code={{ $employerlocation->id }}">
                                                <span class="h-4 w-4">
                                                    <x-icon.solid icon="link" />
                                                </span>
                                            </x-button.secondary>
                                        </span>
                                    </x-ui.table.cell>
                                    <x-ui.table.cell collapse>
                                        <div class="flex space-x-2">
                                            <x-ui.button.negative compact
                                                wire:click.stop="{{ $this->opens('App\Http\Livewire\Admin\Employers\Locations\Delete', ['employerlocation' => $employerlocation]) }}">
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
                        <x-common.empty-notice title="No locations">
                            <x-icon.outline icon="calendar" />
                        </x-common.empty-notice>
                    @else
                        <x-common.empty-notice title="No locations found">
                            <x-icon.outline icon="calendar" />
                        </x-common.empty-notice>
                    @endif
                </div>
            @endif
        </div>
    </div>
    <div class="mx-10 py-5 border-t border-gray-300 flex items-center">
        <div class="space-x-4 divide-x divide-gray-300 flex items-center text-xs text-gray-600">
            <div>{{ $locations->total() }} Locations</div>
        </div>
        <div class="ml-auto"> {{ $locations->onEachSide(1)->links('components.ui.pagination') }} </div>
    </div>
</div>
