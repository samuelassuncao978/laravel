<div class="flex relative">
    <div class="flex absolute z-50 left-0 right-0 bottom-0 p-2 space-x-2 justify-end">
        <!-- 
   <input
            type="text"
            id="{{ $name ?? '' }}"
            name="{{ $name ?? '' }}[number]"
            {{ isset($autofocus) && $autofocus === true ? 'autofocus' : '' }}
            {{ isset($required) ? 'required' : '' }}
            {{ isset($autocomplete) ? 'autocomplete="' . $autocomplete . '"' : '' }}
            {{ $attributes->whereStartsWith('wire') }}
            value="{{ $value ?? '' }}"
            class="appearance-none outline-none focus:ring-2 focus:shadow-inner shadow-sm ring-gray-300 focus:border-gray-400 block w-full bg-white text-gray-500 text-sm border border-gray-100 rounded py-3 px-4"
        /> 
  -->
        <button type="button"
            class="bg-gray-100 shadow focus:outline-none z-10 right-2 p-2 rounded-full text-xs text-gray-400 hover:text-blue-500"
            @click="manual = !manual">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                    clip-rule="evenodd" />
            </svg>
        </button>
        <button type="button"
            class="bg-gray-100 shadow focus:outline-none z-10 right-2 p-2 rounded-full text-xs text-gray-400 hover:text-blue-500"
            @click="manual = !manual">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
        </button>
    </div>

    <div
        class="h-64 focus:ring-2 focus:shadow-inner shadow-sm ring-gray-300 focus:border-gray-400 block w-full bg-white text-gray-500 text-sm border border-gray-100 rounded overflow-hidden">
        <x-mapbox :markers="[[13.4105300, 52.5243700]]"
            :options="['attributionControl' => false, 'zoom'=>18, 'center'=> [13.4105300, 52.5243700], 'style'=> 'mapbox://styles/mapbox/navigation-preview-day-v4' ]"
            class="w-full h-full" />
    </div>
</div>
