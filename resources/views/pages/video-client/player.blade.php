<div x-data="{
    accessToken: '{{ $this->token() }}',
    call: null,
    status: 'idle',
    connecting: false,
    ending: false,

    connection: null,
    participants: {},

    hud(identity){
        const ref = {
            container: document.createElement('div'),
            container_video: document.createElement('div'),
            container_audio: document.createElement('div'),
            container_meta: document.createElement('div')
        }
        // Set Styles
        ref.container.id = identity;
        ref.container_video.id = identity+'_video';
        ref.container_audio.id = identity+'_audio';
        ref.container_meta.id = identity+'_meta';
        ref.container.className = 'relative overflow-hidden h-full w-full';
        ref.container_video.className = 'h-full w-full absolute inset-0';
        ref.container_audio.className = 'hidden';
        ref.container_meta.className = 'hidden';
        ref.container.appendChild(ref.container_video)
        ref.container.appendChild(ref.container_audio)
        ref.container.appendChild(ref.container_meta)

        return ref;
    },
    participant(participant){
        console.log('id',participant.identity);
        const identity = (participant.identity ? participant.identity : participant)
        
        if(!this.participants[identity]){

        
            const ref = this.hud(identity);
   
        
            // container.addEventListener('click',() =>{ this.participants[identity].primary() })

            this.participants[identity] = {
                ref,
                participant,
                local: (participant.constructor.name === 'LocalParticipant' ? true : false),
                mount:(to = 'participants')=>{ 
                    this.participants[identity].unmount();
                    this.participants[identity].attach();

                    this.participants[identity].ref.container_meta.innerText = identity

                    document.getElementById(to).appendChild(this.participants[identity].ref.container)
                },
                unmount:()=>{ 
                    while (this.participants[identity].ref.container_audio.firstChild) {
                        this.participants[identity].ref.container_audio.removeChild(this.participants[identity].ref.container_audio.lastChild);
                    }
                    while (this.participants[identity].ref.container_video.firstChild) {
                        this.participants[identity].ref.container_video.removeChild(this.participants[identity].ref.container_video.lastChild);
                    }
                    this.participants[identity].ref.container.remove();
                },
                disconnect: ()=>{
                    this.participants[identity].unmount();
                    delete this.participants[identity]
                },
                mute: () => {
                    this.connection.localParticipant.videoTracks.forEach((track)=>{
                        track.disable();
                    })
                },
                primary: () => {
                    for(let participant in this.participants){
                        if(this.participants[participant].local){
                            this.participants[participant].mount('local')
                        }else{
                            this.participants[participant].mount('participants')
                        }
                    }
                    this.participants[identity].mount('primary')
                },
                attach:()=>{
               
                    if(this.participants[identity].local){
                        Twilio.Video.createLocalVideoTrack().then(track => {
                            var el = track.attach()
                            if(track.kind === 'video'){
                                el.className = 'w-full h-full shadow-2xl object-cover';
                                this.participants[identity].ref.container_video.appendChild(el);
                            }else{
                                this.participants[identity].ref.container_audio.appendChild(el);
                            }
                        });
                    }else{
                        participant.tracks.forEach(publication => {
                            if (publication.isSubscribed) {
                                const track = publication.track;
                                var el = track.attach()
                                if(track.kind === 'video'){
                                    el.className = 'w-full h-full shadow-2xl object-cover';
                                    this.participants[identity].ref.container_video.appendChild(el);
                                }else{
                                    this.participants[identity].ref.container_audio.appendChild(el);
                                }
                                
                            }
                        });
                    }
                }
            }

            if(!this.participants[identity].local){
                participant.on('trackSubscribed', track => {
                    this.participants[identity].attach();
                });
                participant.on('trackUnsubscribed', track => {
                    this.participants[identity].attach();
                });
            }

        }


        console.log(this.participants)
        return this.participants[identity]
       
    },

   
    
    connectToRoom(){
        this.connecting = true
        const { connect, createLocalVideoTrack } = Twilio.Video;
  
        connect( this.accessToken, { name:'cool room', audio: true, facingMode: 'environment', video: {  width: { ideal: 4096 },
        height: { ideal: 2160 }, frameRate:{ min: 8, max:60  } } }).then(connection => {
            this.connection = connection;
            window.addEventListener('beforeunload', ()=>{ connection.disconnect() });

            
            console.log(`Successfully joined a Room: ${connection}`);

            const el = {
                local: document.getElementById('local'),
                participants: document.getElementById('participants')
            };

            

            const videoChatWindow = document.getElementById('video-chat-window');
            
       
            const me = this.participant(connection.localParticipant);
            me.mount('primary');

       

            connection.participants.forEach((participant) => {
                const { primary } = this.participant(participant)
                primary();
            });

            connection.on('participantDisconnected', participant => {
                const { disconnect } = this.participant(participant)
                disconnect();
                console.log(`A remote Participant disconnected: ${participant}`);
            });

            connection.on('participantConnected', participant => {
                const { primary } = this.participant(participant)
                primary();
                console.log(`A remote Participant connected: ${participant}`);
            });

        }, error => {
            console.error(`Unable to connect to Room: ${error.message}`);
        });
    }
}" class="flex flex-grow w-full h-full p-10 bg-gray-500">



    <div id="video-chat-window" class="bg-gray-800 flex rounded-3xl w-full h-full relative overflow-hidden shadow-lg">

        <!-- <div class="flex items-center space-x-4 absolute top-10 left-10 z-20">
            <div class="h-20 w-20 overflow-hidden rounded-2xl bg-gray-800"></div>
            <div class="flex flex-col">
                <span>With</span>
                <span class="tracking-widest text-lg">Brad Martin</span>
            </div>
        </div> -->


        <div class="absolute top-10 left-10 rounded-3xl overflow-hidden h-20 w-20 z-50" id="local"></div>
        <div class="absolute top-10 right-10 z-20 hidden" id="participants"></div>
        <div class="absolute inset-0 z-10 flex items-center justify-center overflow-hidden" id="primary"></div>

        @include('pages.video-client.splash-dialog')


        <div class="absolute z-50 top-5 left-5 h-20 w-52 bg-contain bg-left-top bg-no-repeat opacity-20"
            style="filter: brightness(0) invert(1); background-image:url('https://sihq-bp-production-bucket.s3-ap-southeast-2.amazonaws.com/c5d2c2ca07cd44d8bf3d48f1f53c4932/b46f317d-531e-4b5b-9918-e04286541ac5')">

        </div>



        <div
            class="absolute bottom-5 z-30 left-1/2 transform -translate-x-1/2 flex bg-gray-800 bg-opacity-50 rounded p-3 px-10">

            <button x-show="!connection" x-on:click="connectToRoom()"
                class="mx-2 bg-green-800 hover:bg-green-700 focus:ring-green-200 text-white flex justify-center items-center flex-grow uppercase focus:outline-none text-xs rounded focus:ring-4 relative overflow-hidden shadow py-3 px-8">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                </svg>
                Start
                <span x-show="connecting"
                    class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 cursor-wait">
                    <span style="border-top-color:transparent; "
                        class="block absolute border-solid animate-spin rounded-full border-white opacity-90 border-2 h-5 w-5"></span>
                </span>
            </button>

            <button x-show="connection"
                class="mx-2  bg-red-800 hover:bg-red-700 focus:ring-red-200 text-white flex justify-center items-center flex-grow uppercase focus:outline-none text-xs rounded focus:ring-4 relative overflow-hidden shadow py-3 px-8">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 8l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2M5 3a2 2 0 00-2 2v1c0 8.284 6.716 15 15 15h1a2 2 0 002-2v-3.28a1 1 0 00-.684-.948l-4.493-1.498a1 1 0 00-1.21.502l-1.13 2.257a11.042 11.042 0 01-5.516-5.517l2.257-1.128a1 1 0 00.502-1.21L9.228 3.683A1 1 0 008.279 3H5z" />
                </svg>
                End call
                <span x-show="ending"
                    class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 cursor-wait">
                    <span style="border-top-color:transparent; "
                        class="block absolute border-solid animate-spin rounded-full border-white opacity-90 border-2 h-5 w-5"></span>
                </span>
            </button>

            <!-- 
            <button x-show="connection" class="mx-2 bg-gray-800 hover:bg-gray-700 focus:ring-gray-200 text-white flex justify-center items-center flex-grow uppercase focus:outline-none text-xs rounded focus:ring-4 relative overflow-hidden shadow py-3 px-8">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z" />
                </svg>
            </button> -->


        </div>




    </div>


</div>
