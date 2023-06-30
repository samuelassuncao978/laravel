
     <div class="bg-white m-4  lg:m-8 flex flex-col " x-init="
     
     Livewire.on('App\\Http\\Livewire\\Portal\\Homework\\Player', postId => {
    
        document.body.classList.toggle('overflow-hidden') 
        document.body.classList.toggle('scrollbar') 
    
    });
">

    @if ($this->on('App\Http\Livewire\Portal\Homework\Player'))
        @livewire('portal.homework.player', $this->parameters('App\Http\Livewire\Portal\Homework\Player'))
    @endif

    <div class="my-5 text-2xl text-gray-600 font-semibold flex flex-col md:flex-row">
        <div>Recommended</div>


        <div class="flex items-center md:ml-auto mt-4 w-full md:mt-0 md:w-52 ">

            <div class="relative flex w-full">
                <input type="text"
                    class="
    flex-grow
        rounded-full px-4 py-1 text-gray-500 flex space-x-2 bg-gray-200 bg-opacity-50
        text-sm
        pl-8 bg-transparent
        appearance-none outline-none focus:ring-2  focus:shadow-inner shadow-sm ring-gray-300 focus:border-gray-400 w-full focus:bg-white border border-gray-100
        "
                    placeholder="Find" />


                <span wire:loading.remove wire:target="search"
                    class="h-4 w-4 flex-shrink-0 flex absolute text-gray-400 top-1/2 transform translate-x-0.5 -translate-y-1/2 left-2">
                    <x-icon.solid icon="search" />
                </span>

                <div class="absolute left-2 bottom-1/2 transform translate-y-1/2 translate-x-1" wire:loading
                    wire:target="search">
                    <div style="border-top-color:transparent"
                        class="border-solid animate-spin  rounded-full border-gray-400 border h-3 w-3"></div>
                </div>
            </div>
        </div>


    </div>
    <div class="flex flex-wrap -mx-2 md:-mx-4">

        @foreach (auth()->guard('client')->user()->homework()->limit(3)->get()
    as $key => $homework)
            @if ($key < 1)
                <div class="w-full xl:w-2/4 p-2 md:p-4 h-72 text-3xl">
                    @include('segments.portal.resource-tile',[
                    'pinned'=>true,
                    'title'=>$homework->name,
                    'category'=>$homework->category,
                    'image'=>optional($homework->images()->first())->uri(),
                    'click'=>$this->opens('App\Http\Livewire\Portal\Homework\Player',['homework'=> $homework ])
                    ])
                </div>
            @else
                <div class="w-full md:w-1/2 xl:w-1/4 p-2 md:p-4 h-48 md:h-72 text-3xl">
                    @include('segments.portal.resource-tile',['title'=>$homework->name,'category'=>$homework->category,'image'=>optional($homework->images()->first())->uri(),
                    'click'=>$this->opens('App\Http\Livewire\Portal\Homework\Player',['homework'=> $homework ])])
                </div>
            @endif
        @endforeach



    </div>


    <div class="my-5 text-2xl text-gray-600 font-semibold">
        Discover resources
        <div class="text-xs">Stress, Sleep, Anxiety</div>
    </div>

    <div class="flex flex-wrap -mx-2 md:-mx-4">
        @foreach (auth()->guard('client')->user()->homework()->offset(3)->limit(2000)->get()
    as $key => $homework)
            <div class="w-full sm:w-1/2 lg:w-1/3 xl:w-1/4 p-2 md:p-4 h-48 text-lg"
                wire:click="{{ $this->opens('App\Http\Livewire\Portal\Homework\Player', ['homework' => $homework]) }}">
                @include('segments.portal.resource-tile',['title'=>$homework->name,'category'=>$homework->category,'image'=>optional($homework->images()->first())->uri()])
            </div>
        @endforeach
    </div>





</div>
