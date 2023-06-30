<div class="h-full w-full  flex flex-grow" x-data="{
    connection: null,
    participants: @entangle('participants'),
    isHost: @entangle('isHost'),
    status: @entangle('status'),
    config: {
        audio: true,
        facingMode: 'environment',
        dominantSpeaker: true,
        video: {
            width: { ideal: 4096 },
            height: { ideal: 2160 },
            frameRate:{ min: 8, max:60  }
        }
    },




    init(){
        const { connect, createLocalVideoTrack } = Twilio.Video;
        connect('{{ $token }}', this.config).then(connection => {
            window.$connection = connection;
            window.addEventListener('beforeunload', ()=>{
                connection.disconnect()
            });

            connection.participants.forEach((participant) => {
                 $wire.connected(`${participant.identity}`);
            });


            connection.on('participantDisconnected', participant => {
                $wire.disconnect(`${participant.identity}`);
            });

            connection.on('participantConnected', participant => {
                $wire.connected(`${participant.identity}`);
            });

            connection.once('disconnected', error => {
                console.log(`Room disconnected ${error}`);
            });

            connection.on('dominantSpeakerChanged', function(participant) {
                console.log('A new RemoteParticipant is now the dominant speaker:', participant);
            });

            $wire.connected('{{ $identity }}');



        }, error => {
            console.error(`Unable to connect to Room: ${error.message}`);
        });
    }
}">
    <div class="absolute inset-0 opacity-10">

        <div class="absolute inset-0 bg-preview animate-pulse"></div>

    </div>


    <!-- Restore from minimise -->
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
                <button class="p-2 flex rounded-full bg-gray-800 gray:bg-blue-700 focus:ring-blue-200 shadow text-white"
                    x-on:click="(!minimised ? (()=>{ javascript:window.resizeTo(350, 250); window.moveTo(0, 0); minimised = true; }) : (()=>{ }) )">
                    <span class="h-6 w-6">
                        <x-icon.solid icon="save" />
                    </span>
                </button>
            </div>

            <div class="flex h-14">



                <div x-show="isHost" class="flex">
                    <div x-show="status === 'waiting'" class="flex space-x-4">
                        <div class="relative -top-8 flex flex-col items-center justify-center">
                            <button
                                class="p-4 flex rounded-full bg-blue-800 gray:bg-blue-700 focus:ring-blue-200 shadow text-white"
                                wire:click="h_start">
                                <span class="h-6 w-6">
                                    <x-icon.solid icon="video-camera" />
                                </span>
                            </button>
                            <span class="text-xs absolute -bottom-5">Connect</span>
                        </div>
                    </div>
                    <div x-show="status === 'admitted'" class="flex space-x-4">
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




            </div>

            <div class="flex w-1/5 bg-green-50">
                <x-ui.button.standard type="button" bold wire:click="h_reset">
                    Reset
                </x-ui.button.standard>
            </div>
        </div>
    </div>









    <div x-show="status === 'admitted'" class="h-full w-full gap-1"
        :class="{'grid grid-cols-1': (Object.values(participants).filter((p)=> !p.isMe).length === 2), 'grid grid-cols-2': (Object.values(participants).filter((p)=> !p.isMe).length === 2),'grid grid-cols-3': (Object.values(participants).filter((p)=> !p.isMe).length === 3),'grid grid-cols-4': (Object.values(participants).filter((p)=> !p.isMe).length > 3)}">
        <template x-for="participant in Object.values(participants).filter((p)=> !p.isMe).filter((p)=> !p.isMe)"
            :key="participant.id">
            @include('pages.video.participant')
        </template>
    </div>

    @include('pages.video.local')

    <div x-show="status === 'waiting'">
        <div x-show="!isHost">Waiting on host</div>

        <div class="flex flex-col bg-gray-50 p-5" x-show="isHost">
            <div class="font-bold">Waiting list:</div>
            <template x-for="participant in Object.values(participants).filter((p)=> !p.isMe).filter((p)=> !p.isMe)"
                :key="participant.id">
                <div>
                    <span x-text="participant.first_name"></span>&nbsp;<span x-text="participant.last_name"></span>
                </div>
            </template>
        </div>


    </div>




</div>
