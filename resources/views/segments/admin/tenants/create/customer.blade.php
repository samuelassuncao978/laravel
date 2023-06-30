<div class="divide-y divide-gray-200">
    <div class="py-8 text-base leading-6 text-gray-700 sm:text-lg sm:leading-7 space-y-4 px-4">
        <div class="flex">
            <x-field type="text" name="company" label="Company name" wire:model="customer.company_name" />
        </div>
        <div class="flex flex-col md:flex-row md:space-x-8">
            <div class="flex w-full md:w-1/2">
                <x-field type="text" name="customer.first_name" label="First name" wire:model="customer.first_name"
                     />
            </div>
            <div class="flex w-full md:w-1/2">
                <x-field type="text" name="customer.last_name" label="Last name" wire:model="customer.last_name"
                     />
            </div>
        </div>
        <div class="flex flex-col md:flex-row md:space-x-8">
            <div class="flex w-full md:w-1/2">
                <x-field type="text" name="customer.email" label="Email" wire:model="customer.email" />
            </div>
            <div class="flex w-full md:w-1/2">
                <x-field type="phone" name="customer.phone" label="Phone" wire:model="customer.phone" />
            </div>
        </div>
    </div>
</div>
