<form wire:submit.prevent="save">
    <x-ui.modal.window>


        <div class="flex flex-col flex-grow items-center justify-center px-10 py-10 pb-5 w-96">

            <div class="rounded-lg bg-gray-50 p-5 border border-gray-200 flex items-center justify-center">
                {!! $this->qrcode() !!}
            </div>
            <div class="text-xs text-gray-500 max-w-xs mt-1 pt-2 mx-auto text-center">
                <button type="button" class="text-blue-500 hover:underline" wire:click="download()">Download</button> qr code
            </div>
            <div class="flex items-center text-xs text-gray-300 my-8 w-full">
                <div class="flex-grow h-1 bg-gray-200 rounded-full"></div>
                <div class="px-2">OR</div>
                <div class="flex-grow h-1 bg-gray-200 rounded-full"></div>
            </div>
                <div class="text-xs text-gray-500 max-w-xs mb-2 pt-2 mx-auto text-center">
                Share link
            </div>
            <div class="border border-gray-300 bg-gray-50 select-all shadow-inner rounded p-2 text-gray-600 text-xs flex items-center w-full">
                <span class="truncate">{{ url('/counsellor/1123023434?voucher=12343') }}</span>
            </div>

                  <button type="button"
            class=" text-gray-700 mt-8 z-30 rounded-full bg-gray-200 p-2 hover:bg-gray-300 focus:bg-gray-800 focus:text-white focus:outline-none"
            wire:click="close">
            <svg class="fill-current w-4 h-4 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                <path
                    d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z" />
            </svg>
        </button>

        </div>
    </x-ui.modal.window>
</form>
