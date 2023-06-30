<form wire:submit.prevent="save">
    <x-ui.modal.window class="w-1/2 overflow-hidden">

        <button type="button"
            class="absolute top-5 text-gray-700  right-5 z-30 rounded-full bg-gray-200 p-2 hover:bg-gray-300 focus:bg-gray-800 focus:text-white focus:outline-none"
            wire:click="$emitTo('calendar.calendar','cancel','time-off')">
            <svg class="fill-current w-4 h-4 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                <path
                    d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z" />
            </svg>
        </button>


        <x-modal.masthead title="Time off">
            @slot('information')
                <div>Hours: <span class="text-blue-500">8</span></div>
                <div>Days: <span class="text-blue-500">8</span></div>
            @endslot
            @slot('actions')
                <button
                    class="rounded-full bg-gray-100 p-1 focus:outline-none hover:text-blue-500 text-gray-400 flex flex-shrink-0 px-2 items-center">
                    <span class="h-4 w-4 mr-1">
                        <x-icon.solid icon="plus" />
                    </span>
                    Add
                </button>
            @endslot
        </x-modal.masthead>

        <x-ui.modal.content>
            <div class="h-64 overflow-hidden -mx-8">


                <div class="scroll-shadow relative overflow-hidden h-full" x-data="scroll_shadow()" x-init="init()">
                    <div class="overflow-y-scroll scrollbar scrollbar-thumb-gray-500 h-full" x-ref="content">

                        <div class="sm:p-7 p-4">
                            <x-ui.table>
                                @slot('columns')
                                    <x-ui.table.column class="pt-4 bg-gray-50" collapse>Period</x-ui.table.column>
                                    <x-ui.table.column class="pt-4 bg-gray-50">Reason</x-ui.table.column>
                                    <x-ui.table.column class="pt-4 bg-gray-50" collapse></x-ui.table.column>
                                @endslot
                                @slot('rows')
                                    @foreach ([[], [], [], [], [], [], [], [], [], [], [], []] as $key => $timeoff)
                                        <tr class="hover:bg-blue-50 hover:bg-opacity-50 cursor-pointer">
                                            <x-ui.table.cell>
                                                <span class="text-xs">
                                                    blah
                                                </span>
                                            </x-ui.table.cell>
                                            <x-ui.table.cell>
                                                <span class="text-xs">
                                                    blah
                                                </span>
                                            </x-ui.table.cell>

                                            <x-ui.table.cell>
                                                <x-ui.button.negative bold type="button">
                                                    <span class="h-4 w-4">
                                                        <x-icon.solid icon="trash" />
                                                    </span>
                                                </x-ui.button.negative>
                                            </x-ui.table.cell>

                                        </tr>
                                    @endforeach
                                @endslot
                            </x-ui.table>
                        </div>

                    </div>
                </div>


            </div>
        </x-ui.modal.content>
        <x-ui.modal.actions>
            <span class="flex justify-center flex-grow">
                <span class="flex space-x-2">
                    <x-ui.button.standard bold type="button">Add</x-ui.button.standard>
                </span>
        </x-ui.modal.actions>
    </x-ui.modal.window>
</form>
