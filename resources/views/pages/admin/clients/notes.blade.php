<div class="flex flex-col flex-grow overflow-hidden h-full">


    @if ($this->on('App\Http\Livewire\Admin\Notes\Create'))
        @livewire('admin.notes.create', $this->parameters('App\Http\Livewire\Admin\Notes\Create'))
    @endif

    @if ($this->on('App\Http\Livewire\Admin\Notes\ChangeProtection'))
        @livewire('admin.notes.change-protection', $this->parameters('App\Http\Livewire\Admin\Notes\ChangeProtection'))
    @endif

    @if ($this->on('App\Http\Livewire\Admin\Notes\Delete'))
        @livewire('admin.notes.delete', $this->parameters('App\Http\Livewire\Admin\Notes\Delete'))
    @endif
    @if ($this->on('App\Http\Livewire\Admin\Notes\Recover'))
        @livewire('admin.notes.recover', $this->parameters('App\Http\Livewire\Admin\Notes\Recover'))
    @endif






    <div class="sm:px-7 -mb-0.5 px-4 relative z-10 flex items-center bg-gray-50 py-3 border-b border-gray-200">

        <div class="space-x-4 divide-x divide-gray-300 flex items-center text-xs text-gray-600">
            <x-ui.action-bar.find label="Find:" />
            <x-ui.action-bar.group>
                <x-ui.action-bar.group-option :active="$this->group_by===''" wire:click="$set('group_by','')">None
                </x-ui.action-bar.group-option>
                <x-ui.action-bar.group-option :active="$this->group_by==='Appointment'"
                    wire:click="$set('group_by','Appointment')">Appointment</x-ui.action-bar.group-option>
                <x-ui.action-bar.group-option :active="$this->group_by==='Month'" wire:click="$set('group_by','Month')">
                    Month</x-ui.action-bar.group-option>
                <x-ui.action-bar.group-option :active="$this->group_by==='Protected'"
                    wire:click="$set('group_by','Protected')">Protected</x-ui.action-bar.group-option>
            </x-ui.action-bar.group>
            <span class="pl-3">
                    <livewire:common.scope-withheld />
                </span>
        </div>

        <div class="inline-block ml-auto">
            <x-ui.button.standard compact bold
                wire:click="{{ $this->opens('App\Http\Livewire\Admin\Notes\Create', [ 'client' => $client ]) }}">

                Create note
            </x-ui.button.standard>
        </div>
    </div>



    <div class="scroll-shadow relative overflow-hidden h-full" x-data="scroll_shadow()" x-init="init()">
        <div class="overflow-y-scroll scrollbar scrollbar-thumb-gray-500 h-full" x-ref="content">









            @if (count($notes ?? []) > 0)
                <div class="sm:p-7 p-4">
                    <x-ui.table>
                        @slot('columns')
                            <x-ui.table.column class="pt-5">Date</x-ui.table.column>
                            <x-ui.table.column class="pt-5">Note</x-ui.table.column>
                            <x-ui.table.column class="pt-5">Appointment</x-ui.table.column>
                            <x-ui.table.column class="pt-5">Protection</x-ui.table.column>
                        @endslot
                        @slot('rows')
                            @foreach ($notes as $key => $note)
                                <tr 
                                class="hover:bg-blue-50 hover:bg-opacity-50 cursor-pointer {{  $note->deleted_at ? 'opacity-25' :'' }}"
                                    wire:click="invoke('edit-note','{{ json_encode(['id' => $note->id, 'note' => $note->note]) }}')">
                                    <x-ui.table.cell collapse>
                                        <span class="text-xs">
                                            <x-ui.timestamp :date="$note->created_at" local="Y-m-d H:i" />
                                        </span>
                
                                    </x-ui.table.cell>
                                    <x-ui.table.cell>
                                        <span class="font-semibold text-xs">Body chart</span>
                                        <div class="line-clamp-2 text-xs">
                                            {{ $note->note }}
                                        </div>
                                    </x-ui.table.cell>
                                    <x-ui.table.cell collapse>
                                    <span
                                                class="text-xs mr-8 text-blue-500 hover:text-blue-700 cursor-pointer flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path
                                                        d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z" />
                                                </svg>
                                                14:00 06-08-21
                                            </span>
                                    </x-ui.table.cell>
                                    <x-ui.table.cell collapse>
                                        <span class="flex items-center space-x-1 text-xs">
                                            <x-ui.status :text="$note->protection" :value="$note->protection"
                                                :options="['bg-pink-500' => 'sealed','bg-yellow-500' => 'unsealed']" />
                                                <button x-on:click="$event.stopPropagation()"
                                            class=" text-gray-700 h-3 w-3 hover:text-blue-500"
                                            wire:click="{{ $this->opens('App\Http\Livewire\Admin\Notes\ChangeProtection', [ 'note' => $note ]) }}">
                                            <x-icon.solid icon="pencil"/>
                                        </button>
                                        </span>
                                        
                                    </x-ui.table.cell>
                                    <x-ui.table.cell collapse>
                                        @if(empty($note->deleted_at))
                                            <x-ui.button.clear compact
                                                wire:click.stop="{{ $this->opens('App\Http\Livewire\Admin\Notes\Delete', ['note' => $note]) }}">
                                            <span class="h-4 w-4 text-red-600 group-hover:text-red-800">
                                                    <x-icon.solid icon="trash" />
                                                </span>
                                            </x-ui.button.clear>
                                        @else
                                            <x-ui.button.clear compact
                                                wire:click.stop="{{ $this->opens('App\Http\Livewire\Admin\Notes\Recover', ['note' => $note]) }}">
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
                        <x-common.empty-notice title="No notes">
                            <x-icon.outline icon="pencil-alt" />
                        </x-common.empty-notice>
                    @else
                        <x-common.empty-notice title="No notes found">
                            <x-icon.outline icon="search" />
                        </x-common.empty-notice>
                    @endif
                </div>
            @endif
        </div>
    </div>
    <div class="mx-10 py-5 border-t border-gray-300 flex items-center">
        <div class="space-x-4 divide-x divide-gray-300 flex items-center text-xs text-gray-600">
            <div>{{ $notes->total() }} Notes</div>


            <div class="pl-4">
                <x-ui.status text="{{ $notes->where('protection', 'sealed')->count() }} Sealed" value="true"
                    :options="['bg-pink-500' => 'true']" />
            </div>
            <div class="pl-4">
                <x-ui.status text="{{ $notes->where('protection', 'unsealed')->count() }} Unsealed" value="true"
                    :options="['bg-yellow-500' => 'true']" />
            </div>


        </div>
        <div class="ml-auto"> {{ $notes->onEachSide(1)->links('components.ui.pagination') }} </div>
    </div>
</div>
