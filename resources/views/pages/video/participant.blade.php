<div class="h-full w-full bg-preview relative">
    <div class="text-white absolute z-10 bottom-4 left-4" style="text-shadow: 1px 1px rgba(0,0,0,0.5);">
        <span x-text="participant.first_name"></span>&nbsp;<span x-text="participant.last_name"></span>
    </div>
    <div class="absolute inset-0" x-data="{}" x-init="


        const subscribe = (track)=>{
            var el = track.attach()
            if(track.kind === 'video'){
                el.className = 'w-full h-full shadow-2xl object-cover';
                $refs.video.appendChild(el);
            }else{
                $refs.audio.appendChild(el);
            }
        };
        const unsubscribe = (track)=>{
            track.detach().forEach(element => element.remove());
        };


        window.$connection.participants.forEach((p)=>{
                if(participant.id === p.identity){
                    p.tracks.forEach(publication => {
                        if (publication.isSubscribed) {
                            subscribe(publication.track)
                        }
                    });
                    p.on('trackSubscribed', track =>  subscribe(publication.track));
                    p.on('trackUnsubscribed', unsubscribe(publication.track));
                }
            })
    ">
        <div wire:ignore x-ref="audio" class="absolute h-1 w-1 bg-yellow-100 top-0 left-0"></div>
        <div wire:ignore x-ref="video" class="absolute inset-0"></div>
    </div>

</div>
