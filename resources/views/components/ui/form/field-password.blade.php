<script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.4.2/zxcvbn.js"></script>
<div class="flex relative" x-data="{ visible:false, score: 0, password: '' }" @click.away="visible = false">
    <input x-bind:type="visible? 'text':'password'" x-model="password" id="{{ $name ?? '' }}"
        name="{{ $name ?? '' }}" {{ isset($autofocus) && $autofocus === true ? 'autofocus' : '' }}
        {{ isset($required) ? 'required' : '' }}
        {{ isset($autocomplete) ? 'autocomplete="' . $autocomplete . '"' : '' }}
        {{ $attributes->whereStartsWith('wire') }} value="{{ $value ?? '' }}"
        @input="score = zxcvbn(password).score"
        class="appearance-none outline-none focus:ring-2 focus:shadow-inner shadow-sm ring-gray-300 focus:border-gray-400 block w-full bg-white text-gray-500 text-sm border border-gray-100 rounded py-3 px-4" />
    @if (isset($strenght))
        <div class="flex absolute top-1/2 transform -translate-y-1/2 right-12 items-center pointer-events-none" x-cloak>
            <span class="uppercase text-gray-400 mr-2" style="font-size:0.5rem;">
                <span x-show="score===0">UNACCEPTABLE</span>
                <span x-show="score===1">UNACCEPTABLE</span>
                <span x-show="score===2">WEAK</span>
                <span x-show="score===3">OKAY</span>
                <span x-show="score===4">SECURE</span>
            </span>
            <div class="rounded-full  w-5 h-1 overflow-hidden  bg-gray-200 flex">
                <div class=" h-full  rounded-full"
                    :class="{ 'w-1/5': score === 0, 'w-2/5 bg-red-400' : score === 1,'w-3/5 bg-orange-400': score === 2, 'w-4/5 bg-yellow-400': score === 3, 'w-full bg-green-400': score === 4 }">
                </div>
            </div>
        </div>
    @endif

    <button type="button" :class="{'bg-gray-200': visible }" x-cloak
        class="absolute focus:outline-none z-10 right-2 p-2 rounded-full top-1/2 transform -translate-y-1/2 text-xs text-gray-400 hover:text-blue-500"
        @click="visible = !visible">
        <svg x-show="!visible" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
            fill="currentColor">
            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
            <path fill-rule="evenodd"
                d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                clip-rule="evenodd" />
        </svg>
        <svg x-show="visible" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
            fill="currentColor">
            <path fill-rule="evenodd"
                d="M3.707 2.293a1 1 0 00-1.414 1.414l14 14a1 1 0 001.414-1.414l-1.473-1.473A10.014 10.014 0 0019.542 10C18.268 5.943 14.478 3 10 3a9.958 9.958 0 00-4.512 1.074l-1.78-1.781zm4.261 4.26l1.514 1.515a2.003 2.003 0 012.45 2.45l1.514 1.514a4 4 0 00-5.478-5.478z"
                clip-rule="evenodd" />
            <path
                d="M12.454 16.697L9.75 13.992a4 4 0 01-3.742-3.741L2.335 6.578A9.98 9.98 0 00.458 10c1.274 4.057 5.065 7 9.542 7 .847 0 1.669-.105 2.454-.303z" />
        </svg>
    </button>
</div>
