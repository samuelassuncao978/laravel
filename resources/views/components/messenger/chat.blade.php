<div class="overflow-y-scroll flex flex-col scrollbar scrollbar-thumb-gray-500 flex-grow" x-ref="content" x-data="{





    scrollIntoView(behavior = 'smooth'){ 
        this?.$refs?.content?.scroll({ top: this?.$refs?.content?.scrollHeight, behavior }) 
    }
}" x-init="scrollIntoView('auto');     
$wire.on('message-sent', () => { 
    scrollIntoView()
});
$wire.on('new-message', () => { 
    scrollIntoView()
});
    ">



    <div class=" px-5 py-2">
        {{ $slot ?? '' }}
    </div>



</div>
