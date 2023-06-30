
  <div class="">
    <div class="w-full flex">
        <div class=" w-72 p-5 space-y-4">
            <div>
                <div class="flex items-center justify-between">
                    <div class="font-semibold text-gray-600">Type</div>
                    <div>
                        <button class="flex items-center text-blue-700 text-xs">
                            <span class="h-4 w-4 mr-1"><x-icon.solid icon="refresh"/></span>
                            Reset all
                        </button>
                    </div>
                </div>
                <div class="py-3 flex">
                    <x-ui.form.field type="radio" label="Standard" value="standard" name="type" inline />
                    <x-ui.form.field type="radio" label="Supervision" value="supervision" name="type" inline />
                </div>
            </div>
                <div>
                <div class="flex items-center justify-between">
                    <div class="font-semibold text-gray-600">Method</div>
                </div>
                <div class="py-3 flex">
                    <x-ui.form.field type="radio" label="Video" value="video" name="method" inline />
                    <x-ui.form.field type="radio" label="Telephone" value="telephone" name="method" inline />
                </div>
            </div>
            <div>
                <div class="flex items-center justify-between">
                    <div class="font-semibold text-gray-600">State</div>
                </div>
                <div class="py-3 grid grid-cols-2 gap-2">
                    <x-ui.form.field type="radio" label="NSW" value="NSW" name="state" inline />
                    <x-ui.form.field type="radio" label="ACT" value="ACT" name="state" inline />
                    <x-ui.form.field type="radio" label="VIC" value="VIC" name="state" inline />
                    <x-ui.form.field type="radio" label="QLD" value="QLD" name="state" inline />
                    <x-ui.form.field type="radio" label="TAS" value="TAS" name="state" inline />
                    <x-ui.form.field type="radio" label="WA" value="WA" name="state" inline />
                    <x-ui.form.field type="radio" label="NT" value="NT" name="state" inline />
                </div>
            </div>
            <div>
                <div class="flex items-center justify-between">
                    <div class="font-semibold text-gray-600">Practice areas</div>
                </div>
                <div class="py-3 space-y-2 px-5 -mx-5 scrollbar max-h-48">
                    <x-ui.form.field type="checkbox" label="Abuse" value="Abuse" name="area" inline />
                    <x-ui.form.field type="checkbox" label="Anger Management" value="Anger Management" name="area" inline />
                    <x-ui.form.field type="checkbox" label="Bullying" value="Bullying" name="area" inline />
                    <x-ui.form.field type="checkbox" label="Depression" value="Depression" name="area" inline />
                    <x-ui.form.field type="checkbox" label="Grief and Loss" value="Grief and Loss" name="area" inline />
                    <x-ui.form.field type="checkbox" label="Relationships" value="Relationships" name="area" inline />
                    <x-ui.form.field type="checkbox" label="Other Addictions" value="Other Addictions" name="area" inline />
                    <x-ui.form.field type="checkbox" label="Eating Disorders" value="Eating Disorders" name="area" inline />
                    <x-ui.form.field type="checkbox" label="Alcohol and Other Drugs" value="Alcohol and Other Drugs" name="area" inline />
                    <x-ui.form.field type="checkbox" label="Anxiety" value="Anxiety" name="area" inline />
                    <x-ui.form.field type="checkbox" label="Crisis Support" value="Crisis Support" name="area" inline />
                    <x-ui.form.field type="checkbox" label="Financial Support" value="Financial Support" name="area" inline />
                    <x-ui.form.field type="checkbox" label="Mental Health" value="Mental Health" name="area" inline />
                    <x-ui.form.field type="checkbox" label="Stress" value="Stress" name="area" inline />
                    <x-ui.form.field type="checkbox" label="Suicidal Thinking, Self Harm" value="Suicidal Thinking, Self Harm" name="area" inline />
                    <x-ui.form.field type="checkbox" label="Trauma" value="Trauma" name="area" inline />
                </div>
            </div>
            <div>
                <div class="flex items-center justify-between">
                    <div class="font-semibold text-gray-600">Gender</div>
                </div>
                <div class="py-3 flex">
                    <x-ui.form.field type="radio" label="Male" value="male" name="radio" inline />
                    <x-ui.form.field type="radio" label="Female" value="female" name="radio" inline />
                </div>
            </div>

        </div>
        <div class="flex-1 p-10 border bg-gray-100 border-gray-200 rounded-l-3xl relative">

            <div class="flex items-center pb-10">
                <span class="text-xl">Find a counsellor</span>
                <div class="space-x-4 flex items-center ml-auto">
                    <div class="relative text-xs pr-6 overflow-hidden rounded-sm bg-white border border-gray-200 p-1 px-2 focus:outline-none active:bg-gray-200 hover:text-blue-500 shadow-sm text-gray-400 flex flex-shrink-0 items-center uppercase">
                    <span class=" font-semibold text-gray-700 h-4 block mr-2">
                            Timezone:
                        </span>
                        Australia/Sydney
                        <select class=" absolute opacity-0 inset-0 w-full appearance-none focus:outline-none">
                        <option value="">Australia/Sydney</option>
                        </select>
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-4/6 text-gray-400 top-1/2 transform -translate-y-1/2 right-1 absolute pointer-events-none"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                        </svg>

                        <div class="absolute inset-0 rounded overflow-hidden" wire:loading wire:target="switch">
                            <x-ui.loading-indicator :loading="true" spinner="border-gray-500" small
                                bg="bg-opacity-50 bg-white" />
                        </div>
                    </div>

                    <div class="relative text-xs pr-6 overflow-hidden rounded-sm bg-white border border-gray-200 p-1 px-2 focus:outline-none active:bg-gray-200 hover:text-blue-500 shadow-sm text-gray-400 flex flex-shrink-0 items-center uppercase">
                        <span class=" font-semibold text-gray-700 h-4 block mr-2">
                            Sort by:
                        </span>
                        Availability
                        <select class=" absolute opacity-0 inset-0 w-full appearance-none focus:outline-none">
                            <option value="Availability">Availability</option>
                            <option value="Cost">A-Z</option>
                            <option value="Cost">$ - $$</option>
                        </select>
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-4/6 text-gray-400 top-1/2 transform -translate-y-1/2 right-1 absolute pointer-events-none"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                        </svg>

                        <div class="absolute inset-0 rounded overflow-hidden" wire:loading wire:target="switch">
                            <x-ui.loading-indicator :loading="true" spinner="border-gray-500" small
                                bg="bg-opacity-50 bg-white" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-10">

                @foreach($users as $user)
                    @include('segments.portal.catalog.catalog-card',[ 'user'=> $user ])
                @endforeach

            </div>
        </div>


    </div>
</div>
