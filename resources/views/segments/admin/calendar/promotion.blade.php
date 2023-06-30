<span>
    @if ($this->show && $this->syncing === false)
        <form wire:submit.prevent="save">
            <x-ui.modal.window class="overflow-hidden rounded-lg">
                <div class="flex flex-col items-center justify-center p-10">
                    <div class="rounded-full bg-green-100 text-green-500 p-3 h-20 w-20">
                        <x-icon.solid icon="calendar" />
                    </div>
                    <div class="text-center mt-4 text-lg text-gray-700 tracking-wide font-bold">Connect your calendar
                    </div>
                    <div class="text-gray-500">SIHQ works best when you connect your existing Gmail or Outlook calendar.
                    </div>
                </div>
                <x-ui.modal.content>
                    <div>
                        <div class="divide-y divide-gray-200 p-5 text-xs max-w-sm mx-auto">

                            <div class="flex items-center mt-2 pt-2">
                                <span class="h-8 w-8 p-2 flex-shrink-0 rounded-full bg-green-600 text-green-50 mr-3">
                                    <x-icon.solid icon="clipboard-check" />
                                </span>
                                Appointments automaticly synced to your calendar.
                            </div>
                            <div class="flex items-center mt-2 pt-2">
                                <span class="h-8 w-8 p-2 rounded-full bg-green-600 text-green-50 mr-3">
                                    <x-icon.solid icon="calendar" />
                                </span>
                                Availability synced to your calendar
                            </div>
                            <div class="flex items-center mt-2 mb-8 pt-2">
                                <span class="h-8 w-8 p-2 rounded-full bg-green-600 text-green-50 mr-3">
                                    <x-icon.solid icon="video-camera" />
                                </span>
                                Join telehealth appointments from your calendar.
                            </div>




                        </div>
                        <div class="text-gray-400 max-w-md text-xs mx-auto pb-4">
                            SIHQ will access a list of calendar event times from your calendar to determine
                            availability. All other details in your calendar are not accessed by SIHQ and remain
                            private.
                        </div>
                    </div>
                </x-ui.modal.content>
                <x-ui.modal.actions>
                    <span>
                        <x-button.secondary bold type="button" wire:click="skip">Skip</x-button.secondary>
                    </span>
                    <span class="flex flex-grow justify-end">
                        <span class="flex space-x-2">
                            <x-o-auth.authorize onComplete="$wire.set('syncing', true)">
                                <button type="button" x-on:click="invoke('/admin/calendar/authorize')"
                                    class="bg-green-800 hover:bg-green-700 focus:ring-green-200 text-white flex justify-center items-center uppercase focus:outline-none text-xs rounded focus:ring-4 relative overflow-hidden shadow py-3 px-8">
                                    <x-o-auth.splash>
                                        <x-ui.loading-indicator :loading="true" />
                                    </x-o-auth.splash>
                                    Connect
                                </button>
                            </x-o-auth.authorize>
                        </span>
                    </span>
                </x-ui.modal.actions>
            </x-ui.modal.window>
        </form>
    @endif

</span>
