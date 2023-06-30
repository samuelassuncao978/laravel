<div class="flex flex-col flex-grow overflow-hidden h-full">
    @if ($this->on('App\Http\Livewire\Admin\Intergrations\Create'))
        @livewire('admin.intergrations.create', $this->parameters('App\Http\Livewire\Admin\Intergrations\Create'))
    @endif

    @if ($this->on('App\Http\Livewire\Admin\VouIntergrationshers\Delete'))
        @livewire('admin.intergrations.delete', $this->parameters('App\Http\Livewire\Admin\Intergrations\Delete'))
    @endif

    @if ($this->on('App\Http\Livewire\Admin\Intergrations\Recover'))
        @livewire('admin.intergrations.recover', $this->parameters('App\Http\Livewire\Admin\Intergrations\Recover'))
    @endif

    @if ($this->on('App\Http\Livewire\Admin\Intergrations\Edit'))
        @livewire('admin.intergrations.edit', $this->parameters('App\Http\Livewire\Admin\Intergrations\Edit'))
    @endif
    <div class="bg-gray-50 border-b border-gray-100">
        <div class="p-5 px-10">
            <h1 class="text-2xl font-bold text-gray-700">Intergrations</h1>
            <p class="text-sm text-gray-500">Configure & manage your intergrations.</p>
        </div>
    </div>
    <div class="border-t border-white">
        <div class="sm:px-7 -mb-0.5 px-4 relative z-10 flex items-center bg-gray-50 py-3 border-b border-gray-200">
            <div class="space-x-4 divide-x divide-gray-300 flex items-center text-xs text-gray-600">
                <x-ui.action-bar.find label="Find:" />
                <span class="pl-3">
                    <livewire:common.scope-withheld />
                </span>
            </div>
            <div class="inline-block ml-auto">
                <x-ui.button.standard compact bold
                    wire:click="{{ $this->opens('App\Http\Livewire\Admin\Intergrations\Create', []) }}">
                    Add intergration
                </x-ui.button.standard>
            </div>
        </div>
    </div>



    <div class="scroll-shadow relative overflow-hidden h-full" x-data="scroll_shadow()" x-init="init()">
        <div class="overflow-y-scroll scrollbar scrollbar-thumb-gray-500 h-full" x-ref="content">
            @if (count($intergrations ?? []) > 0)
                <div class="sm:p-7 p-4">
                    <x-ui.table>
                        @slot('columns')
                            <x-ui.table.column class="pt-5">ID</x-ui.table.column>
                            <x-ui.table.column class="pt-5">Name</x-ui.table.column>
                            <x-ui.table.column class="pt-5">Status</x-ui.table.column>
                            <x-ui.table.column class="pt-5"></x-ui.table.column>
                        @endslot
                        @slot('rows')
                            @foreach ($intergrations as $key => $intergration)
                                <tr class="hover:bg-blue-50 hover:bg-opacity-50 cursor-pointer {{  $intergration->deleted_at ? 'opacity-25' :'' }}"
                                    wire:click="{{ $this->opens('App\Http\Livewire\Admin\Intergrations\Edit', ['intergration' => $intergration]) }}">
                                    <x-ui.table.cell collapse>
                                        <span class="flex items-center w-32 space-x-1">

                                        </span>
                                    </x-ui.table.cell>
                                    <x-ui.table.cell>
                                        <span class="text-xs">
                                            {{ $intergration->manifest->name }}
                                        </span>
                                    </x-ui.table.cell>
                                    <x-ui.table.cell collapse>
                                        <x-ui.status text="Vaild" value="valid"
                                            :options="['bg-green-500' => 'valid','bg-yellow-500' => 'ended','bg-red-500' => 'revoked']" />
                                    </x-ui.table.cell>

                                    <x-ui.table.cell collapse>


                                        @if(empty($intergration->deleted_at))
                                            <x-ui.button.clear compact
                                                wire:click.stop="{{ $this->opens('App\Http\Livewire\Admin\Intergrations\Delete', ['intergration' => $intergration]) }}">
                                                <span class="h-4 w-4 text-red-600 group-hover:text-red-800">
                                                    <x-icon.solid icon="trash" />
                                                </span>
                                            </x-ui.button.clear>
                                        @else
                                            <x-ui.button.clear compact
                                                wire:click.stop="{{ $this->opens('App\Http\Livewire\Admin\Intergrations\Recover', ['intergration' => $intergration]) }}">
                                                <span class="h-4 w-4 text-orange-600 group-hover:text-orange-800">
                                                    <x-icon.solid icon="save" />
                                                </span>
                                            </x-ui.button.clear>
                                        @endif



                                    </x-ui.table.cell>
                                </tr>

                            @endforeach
                        @endslot
                    </x-ui.table>
                </div>
            @else
                <div class="h-full flex items-center justify-center">

                    @if (empty($this->search))
                        <x-common.empty-notice title="No intergrations">
                            <x-icon.outline icon="calendar" />
                        </x-common.empty-notice>
                    @else
                        <x-common.empty-notice title="No intergrations found">
                            <x-icon.outline icon="calendar" />
                        </x-common.empty-notice>
                    @endif
                </div>
            @endif
        </div>
    </div>
    <div class="mx-10 py-5 border-t border-gray-300 flex items-center">
        <div class="space-x-4 divide-x divide-gray-300 flex items-center text-xs text-gray-600">
            <div>{{ $intergrations->total() }} Intergrations</div>
        </div>
        <div class="ml-auto"> {{ $intergrations->onEachSide(1)->links('components.ui.pagination') }} </div>
    </div>
</div>
