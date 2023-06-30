<div class="divide-y divide-gray-200">
    <div class="py-8 text-base leading-6 text-gray-700 sm:text-lg sm:leading-7 ">




    <div class="flex flex-wrap -m-4">
        @foreach(collect($plans)->where('public',true) as $plan)
      <div class="p-4 xl:w-1/2 md:w-1/2 w-full">
        <div class="h-full p-6 rounded-lg border-2  {{ $plan['promoted'] ? 'border-blue-500' : 'border-gray-300' }} flex flex-col relative overflow-hidden">
            @if ($plan['promoted'])
            <span class="bg-blue-500 text-white px-3 py-1 tracking-widest text-xs absolute right-0 top-0 rounded-bl">POPULAR</span>
            @endif
          <h2 class="text-sm tracking-widest title-font mb-1 font-medium">{{ $plan['name'] }}</h2>

            <h1 class="text-5xl text-gray-900 leading-none flex items-center pb-4 mb-4 border-b border-gray-200">
            <span>
                @if($plan['amount'] && $plan['amount'] > 0)
                ${{ number_format($plan['amount'] / 100, 0, '.', ' ') }}
                @else
                    Free
                @endif
            </span>
            @if($plan['amount'] && $plan['amount'] > 0)
                <span class="text-lg ml-1 font-normal text-gray-500">/ {{ $plan['frequency'] }}</span>
            @endif
          </h1>

          <p class="flex items-center text-gray-600 mb-2 text-xs">
            <span class="w-4 h-4 mr-2 inline-flex items-center justify-center bg-gray-400 text-white rounded-full flex-shrink-0">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
                <path d="M20 6L9 17l-5-5"></path>
              </svg>
            </span>Video telehealth appointments
          </p>
          <p class="flex items-center text-gray-600 mb-2 text-xs">
            <span class="w-4 h-4 mr-2 inline-flex items-center justify-center bg-gray-400 text-white rounded-full flex-shrink-0">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
                <path d="M20 6L9 17l-5-5"></path>
              </svg>
            </span>Sync with your calendar
          </p>
          <p class="flex items-center text-gray-600 mb-6 text-xs">
            <span class="w-4 h-4 mr-2 inline-flex items-center justify-center bg-gray-400 text-white rounded-full flex-shrink-0">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
                <path d="M20 6L9 17l-5-5"></path>
              </svg>
            </span>Client notes, files, and more.
          </p>
          <button type="button" wire:click="select_plan('{{ $plan['id'] }}')" class="flex items-center mt-auto text-white  {{ $plan['promoted'] ? 'bg-blue-500 hover:bg-blue-700' : 'bg-gray-400 hover:bg-gray-500' }} border-0 py-2 px-4 w-full focus:outline-none rounded">Select
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-auto" viewBox="0 0 24 24">
              <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
          </button>
          <p class="text-xs text-gray-500 mt-3">{{ $plan['description'] }}</p>
        </div>
      </div>
      @endforeach

    </div>





    </div>
</div>
