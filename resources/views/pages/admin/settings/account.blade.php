<div class="flex flex-col">

    <div class="bg-gray-50">
        <div class="p-5 px-10">
            <h1 class="text-2xl font-bold text-gray-700">Account</h1>
            <p class="text-sm text-gray-500">Logged in as Stefan Mos</p>
        </div>
    </div>


    <form wire:submit.prevent="save" class="flex flex-col overflow-hidden">
        <div class="sm:px-7 px-4 relative z-10 flex items-center bg-gray-50 py-3 border-b border-gray-200">
            <div class="inline-block ml-auto flex space-x-2">
                <x-button.standard compact bold type="submit">
                    Change password
                </x-button.standard>
                <x-button.positive compact bold type="submit">
                    Save changes
                </x-button.positive>
            </div>
        </div>

        <div class=" flex-grow scrollbar">

            <div class="flex m-10">
                <div class="w-1/5">
                    <div class="bg-gray-500 rounded h-64"></div>
                </div>
            </div>

        </div>
    </form>
</div>
