<form wire:submit.prevent="save">
    <x-ui.modal.window>

        <button type="button"
            class="absolute top-5 text-gray-700  right-5 z-30 rounded-full bg-gray-200 p-2 hover:bg-gray-300 focus:bg-gray-800 focus:text-white focus:outline-none"
            wire:click="close">
            <svg class="fill-current w-4 h-4 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                <path
                    d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z" />
            </svg>
        </button>
        <div class="flex flex-col flex-grow items-center justify-center px-10 py-20">
            <div class="rounded-lg bg-gray-50 p-5 border border-gray-200 flex items-center justify-center">
                {!! SimpleSoftwareIO\QrCode\Facades\QrCode::size(200)->generate(url('/attend/' . base64_encode(json_encode(['appointment' => $appointment->id, 'user' => \App\Models\User::inRandomOrder()->first()->id])))) !!}
            </div>
            <div class="text-xs text-gray-500 max-w-xs mt-4 pt-2 mx-auto text-center">Scan this QR code on your Tablet or
                Mobile phone to attend the video appointment on that device.</div>
        </div>
    </x-ui.modal.window>
</form>
