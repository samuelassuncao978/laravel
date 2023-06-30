<div class="flex flex-grow m-0 lg:m-4 flex-wrap  2xl:flex-nowrap">

    <div class="flex w-full 2xl:w-1/2">
        @include('pages.portal.journey')
    </div>
    <div class="flex flex-wrap 2xl:flex-col w-full 2xl:w-1/4">
        @foreach (auth()->guard('client')->user()->homework()->limit(3)->get()
    as $key => $homework)
            @if ($key < 2)
                <div class="flex h-64 w-full lg:w-1/3 2xl:w-full 2xl:h-2/5 p-5 text-3xl">
                    @include('segments.portal.resource-tile',[
                    'pinned'=>true,
                    'title'=>$homework->name,
                    'category'=>$homework->category,
                    'image'=>optional($homework->images()->first())->uri(),
                    'click'=>$this->opens('App\Http\Livewire\Portal\Homework\Player',['homework'=> $homework ])
                    ])
                </div>
            @else
                <div class="flex h-64 w-full lg:w-1/3 2xl:w-full 2xl:h-1/5 p-5"
                    wire:click="{{ $this->opens('App\Http\Livewire\Portal\Homework\Player', ['homework' => $homework]) }}">
                    @include('segments.portal.resource-tile',['title'=>$homework->name,'category'=>$homework->category,'image'=>optional($homework->images()->first())->uri()])
                </div>
            @endif
        @endforeach


    </div>
    <div class="flex flex-wrap 2xl:flex-col w-full 2xl:w-1/4">


        @foreach (auth()->guard('client')->user()->homework()->offset(3)->limit(2)->get()
    as $key => $homework)
            @if ($key < 1)
                <div class="flex h-64 w-full lg:w-1/3 2xl:w-full 2xl:h-1/5 p-5 text-3xl"
                    wire:click="{{ $this->opens('App\Http\Livewire\Portal\Homework\Player', ['homework' => $homework]) }}">
                    @include('segments.portal.resource-tile',['title'=>$homework->name,'category'=>$homework->category,'image'=>optional($homework->images()->first())->uri()])
                </div>
            @else
                <div class="flex h-64 w-full lg:w-1/3 2xl:w-full 2xl:h-2/5 p-5 text-3xl">
                    @include('segments.portal.resource-tile',[
                    'pinned'=>true,
                    'title'=>$homework->name,
                    'category'=>$homework->category,
                    'image'=>optional($homework->images()->first())->uri(),
                    'click'=>$this->opens('App\Http\Livewire\Portal\Homework\Player',['homework'=> $homework ])
                    ])
                </div>
            @endif
        @endforeach




        <div class="flex  w-full lg:w-1/3 2xl:w-full 2xl:h-2/5 p-5">
            <div class="rounded-2xl flex-grow h-full relative shadow-sm overflow-hidden transition-all ease-linear duration-100 transform scale-100 bg-gray-100 flex items-end bg-cover"
                style="background-image:url({{ asset('images/talk-to-someone.png') }});">
                <div class="inset-0 absolute bg-blue-900 flex bg-opacity-50 transition-colors ease-linear duration-100">
                </div>
                <div class="p-5 2xl:p-10 relative z-10 w-full overflow-hidden">

                    <div class="flex flex-col items-start relative z-10">
                        <div class=" text-white mb-4 flex-1 text-3xl" style="text-shadow: 1px 1px rgba(0,0,0,0.5);">
                            Talk to someone
                        </div>
                        <div class=" text-white flex-1" style="text-shadow: 1px 1px rgba(0,0,0,0.5);">
                            If you are in an emergency or at immediate risk of harm to yourself or others, please
                            contact emergency services on 000.
                        </div>
                        <div class="mt-4 text-white flex-1" style="text-shadow: 1px 1px rgba(0,0,0,0.5);">
                            <div class="mb-2">To talk to someone now:</div>
                            Suicide Callback 1300 059 467<br />
                            Lifeline 13 11 14
                        </div>
                    </div>
                </div>
                <div class="absolute inset-0 rounded overflow-hidden z-10" wire:loading
                    wire:target="{{ $click ?? null }}">
                    <x-ui.loading-indicator :loading="true" bg="bg-white bg-opacity-10" spinner="border-white-500" />
                </div>
            </div>
        </div>


    </div>


    <div x-init="
     
     Livewire.on('App\\Http\\Livewire\\Portal\\Homework\\Player', postId => {
    
        document.body.classList.toggle('overflow-hidden') 
        document.body.classList.toggle('scrollbar') 
    
    });
">
@if ($this->on('App\Http\Livewire\Portal\Homework\Player'))

@livewire('portal.homework.player', $this->parameters('App\Http\Livewire\Portal\Homework\Player'))

@endif
    </div>





</div>
