<form wire:submit.prevent="save">
    <x-ui.modal.window>
        <x-modal.masthead title="Edit homework">
            @slot('information')
                <div>Edit homework</div>
            @endslot
        </x-modal.masthead>
        <x-ui.modal.content>
            <div class="divide-y divide-gray-200">
                <div class="py-8 text-base leading-6 text-gray-700 sm:text-lg sm:leading-7 w-96">
                    <div class="flex">
                        <x-ui.form.field type="text" name="name" label="Name" required model="homework.name" />
                    </div>
                    <div class="flex">
                        @php
                            $categories = [['text' => 'Stress', 'id' => 'stress'], ['text' => 'Sleep', 'id' => 'sleep'], ['text' => 'Anxiety', 'id' => 'anxiety'], ['text' => 'Fitness', 'id' => 'fitness'], ['text' => 'Meditation', 'id' => 'metitation'], ['text' => 'Reflection', 'id' => 'reflection'], ['text' => 'Other', 'id' => 'other']];
                        @endphp
                        <x-ui.form.field type="select" :options="$categories" name="homework.category" label="Category"
                            model="homework.category" />
                    </div>
                    <div class="flex">
                        <x-ui.form.field type="file" name="image" label="Image" required model="image" />
                    </div>
                    <div class="flex">
                        <x-ui.form.field type="file" name="file" label="File (PDF)" required model="file" />
                    </div>
                </div>
            </div>
        </x-ui.modal.content>
        <x-ui.modal.actions>
            <span class="flex space-x-2">
                <x-button.secondary bold type="button" wire:click="close">Cancel</x-button.secondary>
                <x-button.positive bold type="submit">Save changes</x-button.positive>
            </span>
        </x-ui.modal.actions>
    </x-ui.modal.window>
</form>
