<div class="flex flex-col flex-grow overflow-hidden h-full">

    @if ($this->on('App\Http\Livewire\Admin\Files\Create'))
        @livewire('admin.files.create', $this->parameters('App\Http\Livewire\Admin\Files\Create'))
    @endif


    <div class="sm:px-7 -mb-0.5 px-4 relative z-10 flex items-center bg-gray-50 py-3 border-b border-gray-200">

        <div class="space-x-4 divide-x divide-gray-300 flex items-center text-xs text-gray-600">

            <x-ui.action-bar.find label="Find:" />
            <x-ui.action-bar.group>
                <x-ui.action-bar.group-option :active="$this->group_by===''" wire:click="$set('group_by','')">None
                </x-ui.action-bar.group-option>
                <x-ui.action-bar.group-option :active="$this->group_by==='sharing'"
                    wire:click="$set('group_by','sharing')">Sharing</x-ui.action-bar.group-option>
                <x-ui.action-bar.group-option :active="$this->group_by==='type'" wire:click="$set('group_by','type')">
                    Type</x-ui.action-bar.group-option>
            </x-ui.action-bar.group>
        </div>

        <div class="inline-block ml-auto">
            <x-ui.button.standard compact bold
                wire:click="{{ $this->opens('App\Http\Livewire\Admin\Files\Create', [
    'client' => $client,
    'user' => auth()->guard('admin')->user(),
]) }}">
                Upload file
            </x-ui.button.standard>
        </div>
    </div>



    <div class="scroll-shadow relative overflow-hidden h-full" x-data="scroll_shadow()" x-init="init()">
        <div class="overflow-y-scroll scrollbar scrollbar-thumb-gray-500 h-full" x-ref="content">








            @if (count($files ?? []) > 0)
                <div class="sm:p-7 p-4">
                    <x-ui.table>
                        @slot('columns')
                            <x-ui.table.column>Name</x-ui.table.column>
                            <x-ui.table.column>Size</x-ui.table.column>
                            <x-ui.table.column>Shared</x-ui.table.column>
                            <x-ui.table.column>Actions</x-ui.table.column>
                        @endslot
                        @slot('rows')

                            @if (!empty($this->group_by))
                                <tr x-data="{selected: false}" class="bg-gray-50">
                                    <td colspan="4">Group</td>
                                </tr>
                            @endif

                            @foreach ($files as $key => $file)




                                <tr x-data="{selected: false}" :class="{'bg-yellow-50':selected}">

                                    <x-ui.table.cell>
                                        {{ $file->name }}
                                    </x-ui.table.cell>
                                    <x-ui.table.cell collapse>
                                        {{ human_filesize($file->size) }}
                                    </x-ui.table.cell>
                                    <x-ui.table.cell collapse>
                                        <x-ui.status text="Private" value="false"
                                            :options="['bg-green-500' => 'true','bg-yellow-500' => 'false']" />

                                    </x-ui.table.cell>
                                    <x-ui.table.cell collapse>
                                        <div class="flex">
                                            <x-ui.button href="/tenants/">Open</x-ui.button>
                                            <x-ui.button href="/tenants/">Delete</x-ui.button>
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
                        <x-common.empty-notice title="No files">
                            <x-icon.outline icon="folder" />
                        </x-common.empty-notice>
                    @else
                        <x-common.empty-notice title="No files found">
                            <x-icon.outline icon="search" />
                        </x-common.empty-notice>
                    @endif
                </div>
            @endif








        </div>
    </div>
    <div class="mx-10 py-5 border-t border-gray-300 flex items-center">
        <div class="space-x-4 divide-x divide-gray-300 flex items-center text-xs text-gray-600">
            <div>{{ count($files) }} Files</div>
            <div class="pl-4">{{ human_filesize($files->pluck('size')->sum()) }}</div>
            <div class="pl-4">
                <x-ui.status text="8 Private" value="true" :options="['bg-yellow-500' => 'true']" />
            </div>
            <div class="pl-4">
                <x-ui.status text="4 Shared" value="true" :options="['bg-teal-500' => 'true']" />
            </div>
        </div>
        <div class="ml-auto"> {{ $files->onEachSide(1)->links('components.ui.pagination') }} </div>
    </div>

</div>
