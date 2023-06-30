<div x-data="{ open: false }" class="relative">
    <button @click="open = !open" class="focus:outline-none flex flex-col items-center text-gray-700">
        <span :class="{ 'ring-2 ring-gray-800 bg-gray-700': open  }"
            class="w-6 h-6 flex flex-col items-center rounded-full">
            <x-ui.avatar :online="true" :name="optional(auth()->user())->name ?? 'Unauthenticated user'" :image="optional(optional(auth()->user())->photo)->uri(true)" />
        </span>
        <div @click.away="open = false" x-cloak x-show="open"
            class="absolute right-0 mt-9 py-2 w-48 bg-white rounded-md shadow-xl z-30">
            <a href="/users/{{ optional(auth()->user())->id }}"
                class="group flex items-center  px-4 py-2 text-sm capitalize text-gray-700 hover:bg-blue-500 hover:text-white">
                <span class="block h-4 w-4 mr-2 text-sm text-blue-500 group-hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                    </svg>
                </span>
                Edit details
            </a>
            <a href="/users/{{ optional(auth()->user())->id }}/change-password"
                class="group flex items-center  px-4 py-2 text-sm capitalize text-gray-700 hover:bg-blue-500 hover:text-white">
                <span class="block h-4 w-4 mr-2 text-sm text-blue-500 group-hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                    </svg>
                </span>
                Change password
            </a>

            <a href="/tenants"
                class="group flex items-center  px-4 py-2 text-sm capitalize text-gray-700 hover:bg-blue-500 hover:text-white">
                <span class="block h-4 w-4 mr-2 text-sm text-blue-500 group-hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                    </svg>
                </span>
                Settings
            </a>
        </div>
        <div class="transform rotate-180 text-center flex items-center text-xs uppercase mt-5 select-none text-gray-400"
            style="writing-mode: vertical-rl;">
            <span class="transform rotate-180">{{ optional(auth()->user())->name ?? 'Unauthenticated user' }}</span>
        </div>
    </button>
</div>
