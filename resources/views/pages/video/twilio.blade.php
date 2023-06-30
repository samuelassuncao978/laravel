<div class="bg-gray-700 h-full w-full overflow-hidden">
    @if (!$this->token)




        <div wire:key="pre-connection"
            class="shadow absolute flex flex-col items-center justify-center h-2/3 w-2/5 bg-white rounded top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
            <div class="flex-grow flex flex-col items-center justify-center">
                @include('pages.video.elements.pre-connect-preview')
                @include('pages.video.elements.device-selection')
            </div>
            <div class="p-10">
                <x-ui.button.standard type="button" bold wire:click="start">
                    Connect
                </x-ui.button.standard>
            </div>
        </div>
    @else



        <div class=" w-full h-full" x-init="window.$twilio.token = '{{ $this->token }}'; window.$twilio.connect();">


            <div id="remote-participants" class="h-full w-full bg-green-500 grid grid-cols-2">

            </div>

        </div>


        <div x-show="minimised"
            class="absolute z-50 flex items-center justify-center inset-0 hover:bg-gray-700 hover:bg-opacity-80 hover:opacity-100 opacity-0 text-white"
            x-on:click="(minimised ? (()=>{ javascript:window.resizeTo(1200, 800); window.moveTo(((screen.width - 1200) / 2),((screen.height - 800) / 4)); minimised = false; }) : (()=>{ }) )">

            <span class="h-14 w-14">
                <x-icon.solid icon="save" />
            </span>

        </div>

        <div class="flex flex-col items-center justify-center w-full absolute bottom-0" x-show="!minimised">
            <svg class=" " id="hump" viewBox="0 0 100 25" xmlns="http://www.w3.org/2000/svg" width="100"
                height="25">
                <path d="M0 25h100c-20 0-25-25-50-25s-30 25-50 25z" fill="#fff"></path>
            </svg>
            <div class="bg-white w-full flex items-center justify-between px-5 py-3">

                <div class="flex w-1/5 ">
                    <button class="p-2 flex rounded bg-gray-800 gray:bg-blue-700 focus:ring-blue-200 shadow text-white"
                        x-on:click="(!minimised ? (()=>{ javascript:window.resizeTo(350, 250); window.moveTo(0, 0); minimised = true; }) : (()=>{ }) )">
                        <span class="h-6 w-6">
                            <x-icon.solid icon="save" />
                        </span>
                    </button>
                </div>

                <div class="flex h-14">
                    <div class="flex">
                        <div class="relative -top-8 flex flex-col items-center justify-center">
                            <button
                                class="p-4 flex rounded-full bg-red-800 gray:bg-blue-700 focus:ring-red-200 shadow text-white"
                                wire:click="h_end">
                                <span class="h-6 w-6">
                                    <x-icon.solid icon="x" />
                                </span>
                            </button>
                            <span class="text-xs absolute -bottom-5">End</span>
                        </div>
                    </div>
                </div>
                <div class="flex w-1/5 bg-green-50">
                    <button x-on:click="window.$twilio.disconnect(); $wire.set('token',null);">Disconnect</button>
                </div>
            </div>
        </div>




    @endif









</div>


</div>
