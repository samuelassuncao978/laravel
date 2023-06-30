<form wire:submit.prevent="save">
    <x-ui.modal.window>
        <x-modal.masthead title="Voucher">
            @slot('information')
                <div>Uses: <span class="text-blue-500">0</span></div>
                <div>Redeemed: <span class="text-blue-500">$0.00</span></div>
            @endslot
        </x-modal.masthead>
        <x-ui.modal.content neat class="relative">
            <div class="p-4 bg-amber-50 border-b border-amber-100 text-xs text-amber-400">
                <span class="max-w-sm flex mx-auto">
                    <span class="flex-shrink-0 h-6 w-6 mr-2">
                        <x-icon.solid icon="light-bulb"/>
                    </span>
                    Changes to vouchers will only effect new uses of the voucher. Any existing appointments using this
                    voucher will remain at the previous voucher value and conditions.
                </span>
            </div>

      <div class="py-4 px-4 mx-auto space-y-2" x-data="{accordion: 'x1'}">
                <div x-on:click="accordion = 'x1'" :class="{'bg-blue-100 text-blue-500 shadow':accordion==='x1', 'bg-gray-100 text-gray-500':accordion!=='x1'}" class="flex cursor-pointer items-center rounded transition-all ease-in-out duration-100 p-2 border border-white">
                    <span class="pl-2 text-xs font-semibold w-96">Voucher details</span>
                    <span :class="{'transform rotate-180':accordion==='x2'}" class="ml-auto p-0.5 h-6 w-6 rounded-full transition-all ease-in-out duration-100"><x-icon.solid icon="chevron-up"/></span>
                </div>
                <div class="flex flex-col" :class="{'hidden':accordion !== 'x1'}">
                    <div class="flex">
                        <x-ui.form.field type="text" name="name" label="name" :value="old('name')" model="voucher.name"
                            defer />
                    </div>
                    <div class="flex">
                        <div class="w-1/2">
                            <x-ui.form.field type="select" name="type" label="Type"
                                :options="[['text'=>'Fixed','id'=>'fixed'],['text'=>'Percentage','id'=>'percentage']]"
                                model="voucher.type" defer />
                        </div>
                        <div class="w-1/2">
                            @if ($voucher->type === 'fixed')
                                <x-ui.form.field type="currency" name="amount" label="Amount" model="voucher.amount"
                                    defer />
                            @else
                                <x-ui.form.field type="percentage" name="amount" label="Amount" model="voucher.amount"
                                    defer />
                            @endif
                        </div>
                    </div>
                </div>
                <div x-on:click="accordion = 'x2'" :class="{'bg-blue-100 text-blue-500 shadow':accordion==='x2', 'bg-gray-100 text-gray-500':accordion!=='x2'}" class="flex cursor-pointer items-center rounded transition-all ease-in-out duration-100 p-2 border border-white">
                    <span class="pl-2 text-xs font-semibold">Eligibility</span>
                    <span :class="{'transform rotate-180':accordion==='x2'}" class="ml-auto p-0.5 h-6 w-6 rounded-full transition-all ease-in-out duration-100"><x-icon.solid icon="chevron-down"/></span>
                </div>
                <div class="flex flex-col" :class="{'hidden':accordion !== 'x2'}">
                    <div class="flex">
                  <x-ui.form.field type="select" name="eligibility" label="Eligibility"
                                :options="[['text'=>'Unrestricted','id'=>'unrestricted'],['text'=>'Once per client','id'=>'once-per-client'],['text'=>'First time client','id'=>'first-time-client']]"
                                model="voucher.eligibility" defer />
                    </div>

                </div>

                <div x-on:click="accordion = 'x3'" :class="{'bg-blue-100 text-blue-500 shadow':accordion==='x3', 'bg-gray-100 text-gray-500':accordion!=='x3'}" class="flex cursor-pointer items-center rounded transition-all ease-in-out duration-100 p-2 border border-white">
                    <span class="pl-2 text-xs font-semibold">Restrictions</span>
                    <span :class="{'transform rotate-180':accordion==='x3'}" class="ml-auto p-0.5 h-6 w-6 rounded-full transition-all ease-in-out duration-100"><x-icon.solid icon="chevron-down"/></span>
                </div>

                <div class="flex flex-col" :class="{'hidden':accordion !== 'x3'}">
                    <div class="flex">
                        <div class="w-1/2">
                           <x-ui.form.field type="select" name="eligibility" label="Eligibility"
                                :options="[['text'=>'Unrestricted','id'=>'unrestricted'],['text'=>'Once per client','id'=>'once-per-client'],['text'=>'First time client','id'=>'first-time-client']]"
                                model="voucher.eligibility" defer />
                        </div>
                        <div class="w-1/2">
                            <x-ui.form.field type="text" name="limit" label="Limit" model="voucher.limit" defer />
                        </div>
                    </div>
                     <div class="flex">
                        <div class="w-1/2">
                           <x-ui.form.field type="date" name="start_at" label="Available from" model="voucher.start_at" defer />
                        </div>
                        <div class="w-1/2">
                           <x-ui.form.field type="date" name="end_at" label="Available until" model="voucher.end_at" defer />
                        </div>
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
