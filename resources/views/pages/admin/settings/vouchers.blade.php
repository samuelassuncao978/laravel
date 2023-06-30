<div class="flex flex-col flex-grow overflow-hidden h-full">
    @if ($this->on('App\Http\Livewire\Admin\Vouchers\Create'))
        @livewire('admin.vouchers.create', $this->parameters('App\Http\Livewire\Admin\Vouchers\Create'))
    @endif

    @if ($this->on('App\Http\Livewire\Admin\Vouchers\Delete'))
        @livewire('admin.vouchers.delete', $this->parameters('App\Http\Livewire\Admin\Vouchers\Delete'))
    @endif

    @if ($this->on('App\Http\Livewire\Admin\Vouchers\Recover'))
        @livewire('admin.vouchers.recover', $this->parameters('App\Http\Livewire\Admin\Vouchers\Recover'))
    @endif

    @if ($this->on('App\Http\Livewire\Admin\Vouchers\Share'))
        @livewire('admin.vouchers.share', $this->parameters('App\Http\Livewire\Admin\Vouchers\Share'))
    @endif

    @if ($this->on('App\Http\Livewire\Admin\Vouchers\Edit'))
        @livewire('admin.vouchers.edit', $this->parameters('App\Http\Livewire\Admin\Vouchers\Edit'))
    @endif
    <div class="bg-gray-50 border-b border-gray-100">
        <div class="p-5 px-10">
            <h1 class="text-2xl font-bold text-gray-700">Vouchers</h1>
            <p class="text-sm text-gray-500">Configure & manage your vouchers.</p>
        </div>
    </div>
    <div class="border-t border-white">
        <div class="sm:px-7 -mb-0.5 px-4 relative z-10 flex items-center bg-gray-50 py-3 border-b border-gray-200">
            <div class="space-x-4 divide-x divide-gray-300 flex items-center text-xs text-gray-600">
                <x-ui.action-bar.find label="Find:" />
                <x-ui.action-bar.group>
                    <x-ui.action-bar.group-option :active="$this->group_by===''" wire:click="$set('group_by','')">None
                    </x-ui.action-bar.group-option>
                    <x-ui.action-bar.group-option :active="$this->group_by==='type'" wire:click="$set('group_by','type')">
                        Type</x-ui.action-bar.group-option>
                    <x-ui.action-bar.group-option :active="$this->group_by==='method'"
                        wire:click="$set('group_by','eligibility')">Eligibility</x-ui.action-bar.group-option>
                    <x-ui.action-bar.group-option :active="$this->group_by==='status'"
                        wire:click="$set('group_by','status')">Status</x-ui.action-bar.group-option>
                </x-ui.action-bar.group>
                <span class="pl-3">
                    <livewire:common.scope-withheld />
                </span>
            </div>
            <div class="inline-block ml-auto">
                <x-ui.button.standard compact bold
                    wire:click="{{ $this->opens('App\Http\Livewire\Admin\Vouchers\Create', ['user' => auth()->guard('admin')->user() ]) }}">
                    Create voucher
                </x-ui.button.standard>
            </div>
        </div>
    </div>



    <div class="scroll-shadow relative overflow-hidden h-full" x-data="scroll_shadow()" x-init="init()">
        <div class="overflow-y-scroll scrollbar scrollbar-thumb-gray-500 h-full" x-ref="content">
            @if (count($vouchers ?? []) > 0)
                <div class="sm:p-7 p-4">
                    <x-ui.table>
                        @slot('columns')
                            <x-ui.table.column class="pt-5">Code</x-ui.table.column>
                            <x-ui.table.column class="pt-5">Name</x-ui.table.column>
                            <x-ui.table.column class="pt-5">From</x-ui.table.column>
                            <x-ui.table.column class="pt-5">To</x-ui.table.column>
                            <x-ui.table.column class="pt-5">Amount</x-ui.table.column>
                            <x-ui.table.column class="pt-5">Eligibility</x-ui.table.column>
                            <x-ui.table.column class="pt-5">Limit</x-ui.table.column>
                            <x-ui.table.column class="pt-5">Status</x-ui.table.column>
                            <x-ui.table.column class="pt-5"></x-ui.table.column>
                        @endslot
                        @slot('rows')
                            @if(!empty($this->group_by))
                                <tr>
                                    <td  colspan="9">
                                        <div class="p-3 my-1 text-xs flex flex-col font-semibold text-gray-700  bg-blue-50 rounded">
                                            Fixed
                                        </div>
                                    </td>
                                </tr>
                            @endif
                            @foreach ($vouchers as $key => $voucher)

                                <tr class="hover:bg-blue-50 hover:bg-opacity-50 cursor-pointer {{  $voucher->deleted_at ? 'opacity-25' :'' }}"
                                    wire:click="{{ $this->opens('App\Http\Livewire\Admin\Vouchers\Edit', ['voucher' => $voucher]) }}">
                                    <x-ui.table.cell collapse>

                                        <span class="flex items-center w-32 space-x-1">
                                            <span
                                                x-on:click="$event.stopPropagation()"
                                                wire:click.stop="{{ $this->opens('App\Http\Livewire\Admin\Vouchers\Share', ['voucher' => $voucher]) }}"
                                                class="text-xs flex p-1 group flex-shrink-0 text-gray-400   hover:bg-blue-500 hover:text-white rounded">
                                                <span class="h-4 w-4 flex-shrink-0"><x-icon.solid icon="qrcode"/></span>
                                            </span>
                                            <span
                                                x-on:click="$event.stopPropagation()"
                                                class="text-xs flex px-2 flex-grow py-1 group   hover:bg-blue-500 hover:text-white rounded">
                                                <span class="select-all truncate">{{ substr($voucher->code, 0, 4) . '-' . substr($voucher->code, 4, 8) }}</span>
                                                <span class="h-4 w-4 ml-1 flex-shrink-0 opacity-0 group-hover:opacity-100"><x-icon.solid icon="clipboard-copy"/></span>
                                            </span>


                                        </span>
                                    </x-ui.table.cell>
                                    <x-ui.table.cell>
                                        <span class="text-xs">
                                            {{ $voucher->name }}
                                        </span>
                                    </x-ui.table.cell>
                                    <x-ui.table.cell collapse>
                                        <span class="text-xs">
                                            @if (!empty($voucher->start_at))
                                                <x-ui.timestamp :date="$voucher->start_at" local="Y-m-d H:i" />
                                            @else
                                                &mdash;
                                            @endif
                                        </span>
                                    </x-ui.table.cell>
                                    <x-ui.table.cell collapse>
                                        <span class="text-xs">
                                            @if (!empty($voucher->end_at))
                                                <x-ui.timestamp :date="$voucher->end_at" local="Y-m-d H:i" />
                                            @else
                                                &mdash;
                                            @endif
                                        </span>
                                    </x-ui.table.cell>
                                    <x-ui.table.cell collapse>
                                        <div class="flex text-xs">
                                            @if ($voucher->type === 'fixed')
                                                ${{ number_format($voucher->amount / 100, 2, '.', ' ') }}
                                            @else
                                                {{ $voucher->amount }}%
                                            @endif
                                        </div>
                                    </x-ui.table.cell>
                                    <x-ui.table.cell collapse>
                                        <span class="text-xs">
                                            {{ $voucher->eligibility }}
                                        </span>
                                    </x-ui.table.cell>

                                    <x-ui.table.cell collapse>
                                        <div class="flex text-xs">
                                            {{ $voucher->limit }}
                                        </div>
                                    </x-ui.table.cell>

                                    <x-ui.table.cell collapse>
                                        <x-ui.status text="Vaild" value="valid"
                                            :options="['bg-green-500' => 'valid','bg-yellow-500' => 'ended','bg-red-500' => 'revoked']" />
                                    </x-ui.table.cell>

                                    <x-ui.table.cell collapse>


                                        @if(empty($voucher->deleted_at))
                                            <x-ui.button.clear compact
                                                wire:click.stop="{{ $this->opens('App\Http\Livewire\Admin\Vouchers\Delete', ['voucher' => $voucher]) }}">
                                                <span class="h-4 w-4 text-red-600 group-hover:text-red-800">
                                                    <x-icon.solid icon="trash" />
                                                </span>
                                            </x-ui.button.clear>
                                        @else
                                            <x-ui.button.clear compact
                                                wire:click.stop="{{ $this->opens('App\Http\Livewire\Admin\Vouchers\Recover', ['voucher' => $voucher]) }}">
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
                        <x-common.empty-notice title="No vouchers">
                            <x-icon.outline icon="calendar" />
                        </x-common.empty-notice>
                    @else
                        <x-common.empty-notice title="No vouchers found">
                            <x-icon.outline icon="calendar" />
                        </x-common.empty-notice>
                    @endif
                </div>
            @endif
        </div>
    </div>
    <div class="mx-10 py-5 border-t border-gray-300 flex items-center">
        <div class="space-x-4 divide-x divide-gray-300 flex items-center text-xs text-gray-600">
            <div>{{ $vouchers->total() }} Vouchers</div>
            <div class="pl-4">
                Uses: <span class="text-blue-500">8</span>
            </div>
            <div class="pl-4">
                Redeemed: <span class="text-blue-500">$0.00</span>
            </div>
            <div class="pl-4">
                <x-ui.status text="0 Vaild" value="true" :options="['bg-green-500' => 'true']" />
            </div>
            <div class="pl-4">
                <x-ui.status text="0 Ended" value="true" :options="['bg-yellow-500' => 'true']" />
            </div>
            <div class="pl-4">
                <x-ui.status text="0 Revoked" value="true" :options="['bg-red-500' => 'true']" />
            </div>

        </div>
        <div class="ml-auto"> {{ $vouchers->onEachSide(1)->links('components.ui.pagination') }} </div>
    </div>
</div>
