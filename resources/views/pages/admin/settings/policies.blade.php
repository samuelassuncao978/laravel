<form wire:submit.prevent="save" class="flex flex-col overflow-hidden">
    <div class="bg-gray-50">
        <div class="p-5 px-10">
            <h1 class="text-2xl font-bold text-gray-700">Policies</h1>
            <p class="text-sm text-gray-500">Terms & privacy policy</p>
        </div>
    </div>
    <div class="sm:px-7 px-4 relative z-10 flex items-center bg-gray-50 py-3 border-b border-gray-200">
        <div class="inline-block ml-auto">
            <x-button.positive compact bold type="submit">
                Save changes
            </x-button.positive>
        </div>
    </div>

     <div class="flex-grow scrollbar">
        <section class="p-10">
            <div class="flex">
                <div class="w-1/4">
                    <h3 class="text-gray-700 text-sm font-bold">Terms of use</h3>
                    <ul class="text-xs text-gray-400 list-disc pl-5 space-y-1 my-2 pr-10">
                        <li>Terms of use must be agreed to by each client</li>
                        <li>If you change the terms of use clients will be prompted to re-accept on their next interaction with the system</li>
                    </ul>
                </div>
                <div class="w-3/4 flex flex-wrap">
                    <div class="w-full h-96  flex">
                        <x-ui.form.field type="textarea" name="terms_of_use" model="terms_of_use.value" bold />
                    </div>
                </div>
            </div>
            <div class="flex">
                <div class="w-1/4">
                    <h3 class="text-gray-700 text-sm font-bold">Privacy Policy</h3>
                    <ul class="text-xs text-gray-400 list-disc pl-5 space-y-1 my-2 pr-10">
                        <li>Privacy policies do not need to be accepted</li>
                        <li>If you change the privacy policy clients will be notified of the change.</li>
                    </ul>
                </div>
                <div class="w-3/4 flex flex-wrap">
                    <div class="w-full h-96  flex">
                        <x-ui.form.field type="textarea" name="privacy_policy" model="privacy_policy.value" bold />
                    </div>
                </div>
            </div>
        </section>
    </div>

</form>
