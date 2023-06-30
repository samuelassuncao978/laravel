<div class="h-1/2 overflow-hidden flex flex-col">
    <x-modal.masthead title="Files">
        @slot('information')
            <div>Files: <span class="text-blue-500">{{ count($files) }}</span></div>
        @endslot
        @slot('actions')
            <button
                wire:click="{{ $this->opens('App\Http\Livewire\Admin\Files\Create', [
    'client' => $client,
    'appointment' => $appointment,
    'user' => auth()->guard('admin')->user(),
]) }}"
                class="rounded-sm bg-white border border-gray-200 p-1 px-4 focus:outline-none active:bg-gray-200 hover:text-blue-500 shadow-sm text-gray-400 flex flex-shrink-0 items-center">
                <span class="h-4 w-4 mr-1">
                    <x-icon.solid icon="paper-clip" />
                </span>
                Upload
            </button>
        @endslot
    </x-modal.masthead>
    <div class="flex flex-grow bg-gray-50 border-t borrder-b border-gray-200 scrollbar scrollbar-thumb-gray-300 ">



        @if (count($files ?? []) > 0)
            <div class="px-3  w-full">
                <x-ui.table class="table-fixed">
                    @slot('columns')
                        <x-ui.table.column class="bg-gray-50 pt-2">Name</x-ui.table.column>
                        <x-ui.table.column class="bg-gray-50 pt-2 w-20">Size</x-ui.table.column>
                        <x-ui.table.column class="bg-gray-50 pt-2 w-32">Shared</x-ui.table.column>
                        <x-ui.table.column class="bg-gray-50 pt-2 w-10"></x-ui.table.column>
                    @endslot
                    @slot('rows')

                        @if (!empty($this->group_by))
                            <tr x-data="{selected: false}" class="bg-gray-50">
                                <td colspan="4">Group</td>
                            </tr>
                        @endif

                        @foreach ($files as $key => $file)




                            <tr x-data="{selected: false}" :class="{'bg-yellow-50':selected}">

                                <x-ui.table.cell class="text-xs">

                                    <div class="flex items-center w-full truncate">
                                        @if ($file->mime === 'application/vnd.openxmlformats-officedocument.wordprocessingml.document')
                                            <span class="h-6 w-6 flex-shrink-0 mr-2 text-blue-500">
                                                <x-icon.file icon="doc" />
                                            </span>
                                        @elseif($file->mime === 'application/pdf')
                                            <span class="h-6 w-6 flex-shrink-0 mr-2 text-red-500">
                                                <x-icon.file icon="pdf" />
                                            </span>
                                        @elseif($file->mime ===
                                            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet')
                                            <span class="h-6 w-6 flex-shrink-0 mr-2 text-green-500">
                                                <x-icon.file icon="xlsx" />
                                            </span>
                                        @elseif($file->mime === 'image/jpg')
                                            <span class="h-6 w-6 flex-shrink-0 mr-2 text-yellow-500">
                                                <x-icon.file icon="jpg" />
                                            </span>
                                        @elseif($file->mime === 'image/png')
                                            <span class="h-6 w-6 flex-shrink-0 mr-2 text-yellow-500">
                                                <x-icon.file icon="png" />
                                            </span>
                                        @elseif($file->mime === 'image/svg')
                                            <span class="h-6 w-6 flex-shrink-0 mr-2 text-yellow-500">
                                                <x-icon.file icon="svg" />
                                            </span>
                                        @elseif($file->mime === 'txt')
                                            <span class="h-6 w-6 flex-shrink-0 mr-2">
                                                <x-icon.file icon="svg" />
                                            </span>
                                        @else
                                            <span class="h-6 w-6 flex-shrink-0 mr-2">
                                                <x-icon.file icon="svg" />
                                            </span>
                                        @endif

                                        {{ $file->name }}
                                    </div>
                                </x-ui.table.cell>
                                <x-ui.table.cell class="text-xs" collapse>
                                    {{ human_filesize($file->size) }}
                                </x-ui.table.cell>
                                <x-ui.table.cell collapse>
                                    <x-ui.status text="Private" value="false"
                                        :options="['bg-green-500' => 'true','bg-yellow-500' => 'false']" />
                                </x-ui.table.cell>
                                <x-ui.table.cell collapse>
                                    <button class="flex"
                                        wire:click="{{ $this->opens('App\Http\Livewire\Admin\Files\Delete', ['file' => $file]) }}">
                                        <span class="h-4 w-4">
                                            <x-icon.solid icon="trash" />
                                        </span>
                                    </button>
                                </x-ui.table.cell>
                            </tr>
                        @endforeach
                    @endslot
                </x-ui.table>
            </div>
        @else


            <x-common.empty-notice title="No files" large>
                <x-icon.outline icon="folder" />
            </x-common.empty-notice>
        @endif
    </div>

    @if ($this->on('App\Http\Livewire\Admin\Files\Create'))
        @livewire('admin.files.create',
        array_merge(['origin'=>'admin.appointments.appointment'],$this->parameters('App\Http\Livewire\Admin\Files\Create')))
    @endif

    @if ($this->on('App\Http\Livewire\Admin\Files\Delete'))
        @livewire('admin.files.delete',
        array_merge(['origin'=>'admin.appointments.appointment'],$this->parameters('App\Http\Livewire\Admin\Files\Delete')))
    @endif


</div>
