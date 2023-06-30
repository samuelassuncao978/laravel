<div class="flex h-96 2xl:h-full flex-grow p-5">
    <div class="rounded-2xl flex-grow flex flex-col  bg-blue-50 relative">

        <div class="font-bold text-lg z-10 p-10 2xl:p-0 2xl:absolute 2xl:top-10 2xl:left-10 text-gray-700 flex flex-col">
            <span>Hi {{ optional(auth()->guard('client')->user())->first_name }}</span>
            <span class="font-light text-sm max-w-xs hidden">Check out our some of these resources to help you improve your
                overall mood.</span>
        </div>


        <div class="w-2/5 ml-auto 2xl:w-full 2xl:h-4/6 py-5 px-32 hidden">

            <div class="aspect-w-1 aspect-h-1 rounded-full border border-gray-200 relative">
                <div class="absolute inset-14 h-auto w-auto rounded-full border border-gray-300">

                    @foreach (auth()->guard('client')->user()->homework()->limit(3)->get() as $key => $homework)

                        @php
                            $position = '';
                            switch ($key) {
                                case 0:
                                    $position = 'top-0 right-0';
                                    break;
                                case 1:
                                    $position = 'bottom-20 -right-10';
                                    break;
                                case 2:
                                    $position = 'bottom-10 -left-14';
                                    break;
                            }
                        @endphp



                        <button
                            wire:click="{{ $this->opens('App\Http\Livewire\Portal\Homework\Player', ['homework' => $homework]) }}"
                            class="flex flex-col items-center focus:outline-none justify-center absolute {{ $position }} transform scale-100 hover:scale-110">
                            <div
                                class="h-10 w-10 overflow-hidden {{ $homework->category === 'sleep' ? 'bg-purple-500 text-purple-300' : '' }} {{ $homework->category === 'stress' ? 'bg-blue-500 text-blue-300' : '' }} {{ $homework->category === 'anxiety' ? 'bg-yellow-500 text-yellow-300' : '' }} rounded-full flex items-center justify-center ">
                                <x-icon.custom :icon="$homework->icon" />
                            </div>
                            <span class="text-xs mt-1 text-gray-500 w-28 text-center">{{ $homework->name }}</span>
                        </button>
                    @endforeach

                    <div class="absolute inset-14 h-auto w-auto rounded-full border border-gray-400">

                    </div>
                </div>
            </div>
        </div>


        <div class="overflow-hidden relative z-5 flex-grow flex items-center justify-start 2xl:justify-center">
            <img src="{{ asset('images/better.png') }}" class="h-2/3" alt="">
        </div>
    </div>

</div>
