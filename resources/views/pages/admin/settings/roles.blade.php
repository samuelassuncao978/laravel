<div class="flex flex-col flex-grow overflow-hidden h-full">

    @if ($this->on('App\Http\Livewire\Admin\Roles\Create'))
        @livewire('admin.roles.create', $this->parameters('App\Http\Livewire\Admin\Roles\Create'))
    @endif

    @if ($this->on('App\Http\Livewire\Admin\Roles\Delete'))
        @livewire('admin.roles.delete', $this->parameters('App\Http\Livewire\Admin\Roles\Delete'))
    @endif

    @if ($this->on('App\Http\Livewire\Admin\Roles\Recover'))
        @livewire('admin.roles.recover', $this->parameters('App\Http\Livewire\Admin\Roles\Recover'))
    @endif

    @if ($this->on('App\Http\Livewire\Admin\Roles\Edit'))
        @livewire('admin.roles.edit', $this->parameters('App\Http\Livewire\Admin\Roles\Edit'))
    @endif

    @if ($this->on('App\Http\Livewire\Admin\Roles\Users'))
        @livewire('admin.roles.users', $this->parameters('App\Http\Livewire\Admin\Roles\Users'))
    @endif
    <div class="bg-gray-50 border-b border-gray-100">
        <div class="p-5 px-10">
            <h1 class="text-2xl font-bold text-gray-700">Roles</h1>
            <p class="text-sm text-gray-500">Configure & manage system user roles.</p>
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
                    wire:click="{{ $this->opens('App\Http\Livewire\Admin\Roles\Create') }}">
                    Create role
                </x-ui.button.standard>
            </div>
        </div>
    </div>


    <div class="scroll-shadow relative overflow-hidden h-full" x-data="scroll_shadow()" x-init="init()">
        <div class="overflow-y-scroll scrollbar scrollbar-thumb-gray-500 h-full" x-ref="content">
            @if (count($roles ?? []) > 0)
                <div class="sm:p-7 p-4">
                    <x-ui.table>
                        @slot('columns')
                            <x-ui.table.column class="pt-5">Name</x-ui.table.column>
                            <x-ui.table.column class="pt-5"></x-ui.table.column>
                        @endslot
                        @slot('rows')
                            @foreach ($roles as $key => $role)
                                <tr class="hover:bg-blue-50 hover:bg-opacity-50 cursor-pointer {{  $role->deleted_at ? 'opacity-25' :'' }}"
                                    wire:click="{{ $this->opens('App\Http\Livewire\Admin\Roles\Edit', ['role' => $role]) }}">
                                    <x-ui.table.cell collapse>
                                        <span class="text-xs">
                                            {{ $role->name }}
                                        </span>
                                    </x-ui.table.cell>
                                    <x-ui.table.cell>
                                        <div class="flex justify-end">
                                            <div class="flex space-x-1">
                                                <div class="flex w-40">
                                                <x-button.standard compact
                                                     wire:click.stop="{{ $this->opens('App\Http\Livewire\Admin\Roles\Users', ['role' => $role]) }}">
                                                    Users
                                                    <span class="ml-2 text-blue-500 font-semibold">{{ $role->users->count() }}</span>
                                                </x-button.standard>
                                                </div>
                                                @if(empty($role->deleted_at))
                                                    <x-ui.button.clear compact
                                                        wire:click.stop="{{ $this->opens('App\Http\Livewire\Admin\Roles\Delete', ['role' => $role]) }}">
                                                        <span class="h-4 w-4 text-red-600 group-hover:text-red-800">
                                                            <x-icon.solid icon="trash" />
                                                        </span>
                                                    </x-ui.button.clear>
                                                @else
                                                    <x-ui.button.clear compact
                                                        wire:click.stop="{{ $this->opens('App\Http\Livewire\Admin\Roles\Recover', ['role' => $role]) }}">
                                                        <span class="h-4 w-4 text-orange-600 group-hover:text-orange-800">
                                                            <x-icon.solid icon="save" />
                                                        </span>
                                                    </x-ui.button.clear>
                                                @endif
                                            </div>
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
                        <x-common.empty-notice title="No roles">
                            <x-icon.outline icon="identification" />
                        </x-common.empty-notice>
                    @else
                        <x-common.empty-notice title="No roles found">
                            <x-icon.outline icon="identification" />
                        </x-common.empty-notice>
                    @endif
                </div>
            @endif
        </div>
    </div>
    <div class="mx-10 py-5 border-t border-gray-300 flex items-center">
        <div class="space-x-4 divide-x divide-gray-300 flex items-center text-xs text-gray-600">
            <div>{{ $roles->total() }} Roles</div>
        </div>
        <div class="ml-auto"> {{ $roles->onEachSide(1)->links('components.ui.pagination') }} </div>
    </div>
</div>
