<div class="flex flex-col flex-grow overflow-hidden h-full">


    <div class="sm:px-7 -mb-0.5 px-4 relative z-10 flex items-center bg-gray-50 py-3 border-b border-gray-200">

        <div class="space-x-4 divide-x divide-gray-300 flex items-center text-xs text-gray-600">
            <x-ui.action-bar.find label="Find:" />
            <x-ui.action-bar.group label="Type:">
                <x-ui.action-bar.group-option :active="$this->group_by==='http'" wire:click="$set('group_by','http')">
                    Http</x-ui.action-bar.group-option>
                <x-ui.action-bar.group-option :active="$this->group_by==='cli'" wire:click="$set('group_by','cli')">Cli
                </x-ui.action-bar.group-option>
                <x-ui.action-bar.group-option :active="$this->group_by==='queue'" wire:click="$set('group_by','queue')">
                    Queue</x-ui.action-bar.group-option>
            </x-ui.action-bar.group>
            <x-ui.action-bar.group label="Effects:">
                <x-ui.action-bar.group-option :active="$this->group_by==='system'"
                    wire:click="$set('group_by','system')">System</x-ui.action-bar.group-option>
                <x-ui.action-bar.group-option :active="$this->group_by==='user'" wire:click="$set('group_by','user')">
                    User</x-ui.action-bar.group-option>
            </x-ui.action-bar.group>
              <x-ui.action-bar.group label="Level:">
                <x-ui.action-bar.group-option :active="$this->group_by==='error'"
                    wire:click="$set('level','error')">Error</x-ui.action-bar.group-option>
                <x-ui.action-bar.group-option :active="$this->group_by==='user'" wire:click="$set('level','Info')">
                    Info</x-ui.action-bar.group-option>
                <x-ui.action-bar.group-option :active="$this->group_by==='user'" wire:click="$set('level','Timeout')">Timeout</x-ui.action-bar.group-option>
            </x-ui.action-bar.group>
        </div>

    </div>


    <div class="scroll-shadow relative overflow-hidden h-full" x-data="scroll_shadow()" x-init="init()">
        <div class="overflow-y-scroll scrollbar scrollbar-thumb-gray-500 h-full" x-ref="content">
            @if (count($logs ?? []) > 0)
                <div class="sm:p-7 p-4">
                    <x-ui.table>
                        @slot('columns')
                            <x-ui.table.column class="pt-5">Group</x-ui.table.column>
                            <x-ui.table.column class="pt-5">User</x-ui.table.column>
                            <x-ui.table.column class="pt-5">Error</x-ui.table.column>
                            <x-ui.table.column class="pt-5">Value</x-ui.table.column>
                        @endslot
                        @slot('rows')
                            @foreach ($logs as $key => $log)


                                <tr class="hover:bg-blue-50 hover:bg-opacity-50 cursor-pointer">
                                    <x-ui.table.cell collapse>
                                        <span class="text-xs">
                                            {{ $log->type }}
                                        </span>
                                    </x-ui.table.cell>
                                    <x-ui.table.cell collapse>
                                        <span class="text-xs">
                                            SYSTEM
                                        </span>
                                    </x-ui.table.cell>
                                    <x-ui.table.cell>
                                        <span class="text-xs w-64 overflow-hidden">
                                            @if(is_array(optional($log->content)['message']))
                                                {{ optional(optional(optional(optional($log)->content['message'])['context'])['exception'])['class'] }}
                                                <pre>{{ json_encode(optional($log->content)['message'],JSON_PRETTY_PRINT)}}</pre>
                                            @else
                                                {{ optional($log->content)['message'] }}
                                            @endif

                                        </span>
                                    </x-ui.table.cell>
                                    <x-ui.table.cell>
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
            <div> Logs</div>
        </div>
        <div class="ml-auto"> </div>
    </div>


</div>
