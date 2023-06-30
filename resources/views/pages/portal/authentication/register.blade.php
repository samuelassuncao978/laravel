<form wire:submit.prevent="{{ $this->employer ? 'save' : 'check' }}" class="bg-white w-full flex flex-col scrollbar">

    <div class="flex relative flex-grow flex-col lg:flex-row">
        <div class="flex flex-col justify-center items-center overflow-hidden lg:w-2/5 text-white bg p-5 pb-20 lg:pb-5">
            <img class="h-8 lg:h-20 w-auto filter invert brightness-0" src="{{ asset('images/logo.png') }}"
                alt="Workflow">
            <div class="hidden lg:flex">
                Welcome
            </div>
            <div class="h-40 w-40 mt-8 hidden lg:flex">

            </div>
        </div>
        <div class="relative flex-grow justify-center flex lg:items-center bg-gray-100 p-5">
            <div class="w-full lg:w-1/2 flex lg:items-center justify-center -mt-20 lg:mt-0">
                <div class="bg-white shadow-lg flex-grow max-w-lg rounded-lg py-10 px-10 lg:px-20">
                    <div class="font-bold text-lg text-gray-700 mb-4">Login</div>
                    <div class="relative">


                        @if (!$this->employer)
                            <div class="relative">
                                <div class="text-xs">Enter your workplace access code here or scan the QR code to
                                    begin.</div>
                                <div class="-mx-3 flex flex-col">
                                    <x-field type="text" name="code" label="Code" wire:model="code" />
                                </div>
                                <div class="flex justify-end mt-6">
                                    <span>
                                        <x-button.primary type="submit" id="Check">Check</x-button.primary>
                                    </span>
                                </div>
                            </div>
                        @else
                            <div class="relative">
                                <div class="flex items-center text-xs uppercase border-b border-gray-300 pb-1 mb-2">
                                    <span
                                        class="flex items-center uppercase tracking-wide text-gray-700 text-xs font-bold mr-2">Employer:</span>
                                    {{ $this->employer->name }}
                                </div>
                                <div class=" flex flex-col space-y-4">
                                    <div class="flex space-x-4">
                                        <div class="flex w-1/2" wire:key="fname">
                                            <x-field type="text" name="first_name" label="First Name" wire:model="client.first_name" defer />
                                        </div>
                                        <div class="flex w-1/2" wire:key="lname">
                                            <x-field type="text" name="last_name" label="Last Name" wire:model="client.last_name" defer />
                                        </div>
                                    </div>
                                    <x-field type="text" name="email" label="email"
                                        wire:model="client.email" defer />
                                    <x-field type="phone" name="phone" label="phone"
                                        wire:model="client.phone" />
                                    <x-field type="password" name="password" label="Password" wire:model="password"
                                        strenght defer />
                                </div>
                                <div class="flex justify-end mt-6">
                                    <span>
                                        <x-button.primary bold type="submit" id="Register">Register</x-button.primary>
                                    </span>
                                </div>
                            </div>
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
