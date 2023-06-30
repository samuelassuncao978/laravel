 <div class="h-64 w-64 hidden md:block overflow-hidden bg-preview absolute top-5 right-5 rounded-xl shadow-2xl border-4 border-white"
     x-data="{
        muted: false,
        camera: true,
        mute(){
            this.muted = !this.muted;
            window.$connection.localParticipant.tracks.forEach((publication)=>{
                if (publication.track.kind === 'audio') {

                    if (this.muted) {
                        publication.track.disable();
                    } else {
                        publication.track.enable();
                    }
                }
            });
        },
        hide(){
            this.camera = !this.camera;
            window.$connection.localParticipant.tracks.forEach((publication)=>{
                if (publication.track.kind === 'video') {
                    if (!this.camera) {
                               console.log('disable')
                        publication.track.disable();
                    } else {
                               console.log('enable')
                        publication.track.enable();
                    }
                }
            });
        }
    }">

     <div class="absolute inset-0" x-init="
        Twilio.Video.createLocalVideoTrack().then(track => {
            var el = track.attach()
            if(track.kind === 'video'){
                el.className = 'w-full h-full shadow-2xl object-cover';
                $refs.video.appendChild(el);
            }else{
                $refs.audio.appendChild(el);
            }
        });
    ">
         <div wire:ignore x-ref="audio" class="absolute h-1 w-1 bg-yellow-100 top-0 left-0"></div>
         <div wire:ignore x-ref="video" class="absolute inset-0"></div>
     </div>
     <div class="text-white absolute z-10 bottom-4 left-4 right-4 flex items-center"
         style="text-shadow: 1px 1px rgba(0,0,0,0.5);">
         <div>
             <span x-text="participants['{{ $identity }}'].first_name"></span>&nbsp;<span
                 x-text="participants['{{ $identity }}'].last_name"></span>
         </div>
         <div class="ml-auto flex items-center">
             <span class="h-4 w-4 ml-2" x-on:click="hide()" :class="{'text-red-500': !camera}">
                 <x-icon.solid icon="video-camera" />
             </span>
             <span class="h-4 w-4 ml-2" x-on:click="mute()" :class="{'text-red-500': muted}">
                 <x-icon.solid icon="volume-up" />
             </span>
         </div>
     </div>
 </div>
