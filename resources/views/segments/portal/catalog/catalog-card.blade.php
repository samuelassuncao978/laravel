 <div class="rounded-xl cursor-default bg-white overflow-hidden  relative group shadow-md  hover:shadow-xl transition-all ease-in-out duration-150">
    <div class="bg-gray-700">
        <div class="h-64 mb-28 group-hover:opacity-50 transition-all ease-in-out duration-200 flex items-center overflow-hidden relative">
            <div class="inset-0 absolute opacity-50 filter blur brightness-120 bg-cover	"
                style="background-image:url({{ optional($user->photo)->uri() }});">
            </div>
            <div style="box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;" src="https://sihq-bp-production-bucket.s3-ap-southeast-2.amazonaws.com/c5d2c2ca07cd44d8bf3d48f1f53c4932/79538456-5a32-4c4e-95cc-21e65e9bf379"
                class="object-contain relative mx-auto">
                 <x-ui.avatar :name="$user->name" :image="optional($user->photo)->uri(true)" rounded="rounded-sm" color="bg-gray-700" long />
            </div>
        </div>
    </div>
    <div style="box-shadow: 0px -4px 3px rgba(50, 50, 50, 0.20);" class="rounded-t-xl border-t-4 border-blue-500 bg-white  group-hover:mt-0 group-hover:translate-y-10 pb-10 transition-all ease-in-out duration-300  -mt-32 overflow-hidden absolute top-0 h-full transform translate-y-full">
        <div class="flex flex-col h-full p-2 pb-5 px-5 ">
            <div class="flex justify-between items-center py-1 mb-2">
                <span class="text-lg text-blue-500 truncate flex-1">{{ $user->first_name }}</span>
                <span class="text-xs text-gray-700 font-semibold">
                        @if(is_array($user->rates_range))
                        {{ implode(' - ',collect($user->rates_range)->map(function($r){ return '$'.number_format($r / 100, 0, '.', ','); })->toArray()) }}
                        @elseif(!empty($user->rates_range))
                            ${{ number_format($user->rates_range / 100, 0, '.', ',') }}
                        @endif
                </span>
            </div>
            <div class="flex-grow scrollbar text-gray-700 px-5 -mx-5">
                <div class="line-clamp-3 group-hover:line-clamp-none text-xs">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis volutpat ante non justo rutrum
                    egestas. Ut condimentum eleifend rhoncus. Donec mi orci, interdum a enim quis, fringilla
                    scelerisque sapien.
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis volutpat ante non justo rutrum
                    egestas. Ut condimentum eleifend rhoncus. Donec mi orci, interdum a enim quis, fringilla
                    scelerisque sapien.
                </div>
            </div>
            <div>
                <div class="text-gray-700 font-semibold text-xs mb-2 border-t border-gray-100 pt-2 mt-2 text-center uppercase" style="font-size:0.6rem;">Upcoming availability:</div>
                    <div class="grid grid-cols-2 gap-px bg-gray-200 border rounded border-gray-200 text-xs text-gray-500">
                        <div class="bg-white p-1 px-2 flex items-center hover:bg-blue-50">
                            <span class="text-blue-500 font-bold mr-2">09:00</span>
                            <span class="flex-grow truncate">Today</span>
                        </div>
                        <div class="bg-white p-1 px-2 flex items-center hover:bg-blue-50">
                        <span class="text-blue-500 font-bold mr-2">01:00</span>
                            <span class="flex-grow truncate">Today</span>
                        </div>
                        <div class="bg-white p-1 px-2 flex items-center hover:bg-blue-50">
                            <span class="text-blue-500 font-bold mr-2">05:00</span>
                            <span class="flex-grow truncate">Today</span>
                        </div>
                        <div class="bg-white p-1 px-2 flex items-center hover:bg-blue-50">
                            <span class="text-blue-500 font-bold mr-2">05:00</span>
                            <span class="flex-grow truncate">Tomorrow</span>
                        </div>
                        <div class="bg-white p-1 px-2 flex items-center hover:bg-blue-50">
                            <span class="text-blue-500 font-bold mr-2">05:00</span>
                            <span class="flex-grow truncate">Tomorrow</span>
                        </div>
                        <div class="bg-white p-1 px-2 flex items-center hover:bg-blue-50">
                            <span class="text-blue-500 font-bold mr-2">05:00</span>
                            <span class="flex-grow truncate">Tomorrow</span>
                        </div>
                    </div>
                    <div class="flex flex-col mt-2">
                        <button class="rounded-md p-2 px-5 flex justify-between items-center flex-grow bg-blue-500 text-white text-xs font-semibold">
                            See all available times
                            <span class="h-4 w-4 ml-2">
                                <x-icon.solid icon="arrow-right"/>
                            </span>
                        </button>
                    </div>
            </div>
        </div>
    </div>
</div>
