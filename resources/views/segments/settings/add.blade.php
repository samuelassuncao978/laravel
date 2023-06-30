<form wire:submit.prevent="save">
    <x-ui.modal.window>
        <x-modal.masthead title="Add Setting">
            @slot('information')
                <div>Add Setting</div>
            @endslot
        </x-modal.masthead>
        <x-ui.modal.content>
            <div class="divide-y divide-gray-200 w-96">
                <div class="py-8 text-base leading-6 text-gray-700 sm:text-lg sm:leading-7 ">
                    <div class="flex">
                        <x-ui.form.field wire:key="settings" type="select" name="setting" label="Setting"
                            :options="\App\Models\Setting::all()->map(function($c){return ['id'=>$c->setting,'text'=>$c->setting];})->toArray()"
                            model="setting" />
                    </div>
                    <div class="flex">
                        <x-ui.form.field type="text" name="value" label="Value" model="value" defer />
                    </div>
                </div>
            </div>
        </x-ui.modal.content>
        <x-ui.modal.actions>
            <span class="flex space-x-2">
                <x-button.secondary bold type="button" wire:click="close">Cancel</x-button.secondary>
                <x-button.positive bold type="submit">Add</x-button.positive>
            </span>
        </x-ui.modal.actions>
    </x-ui.modal.window>
</form>
