<div class="flex flex-col">

    <div class="bg-gray-50">
        <div class="p-5 px-10">
            <h1 class="text-2xl font-bold text-gray-700">Settings</h1>
            <p class="text-sm text-gray-500">Logged in as Stefan Mos</p>
        </div>
    </div>

    @if ($this->on('App\Http\Livewire\Admin\Accounting\Register'))
        @livewire('admin.accounting.register', $this->parameters('App\Http\Livewire\Admin\Accounting\Register'))
    @endif

    <form wire:submit.prevent="save" class="flex flex-col overflow-hidden">
        <div class="sm:px-7 px-4 relative z-10 flex items-center bg-gray-50 py-3 border-b border-gray-200">


            <div class="inline-block ml-auto">
                <x-button.positive compact bold type="submit">
                    Save changes
                </x-button.positive>
            </div>
        </div>

        <div class=" flex-grow scrollbar">



            <section class="p-10">

                <div class="flex">
                    <div class="w-1/4">
                        <h3 class="text-gray-700 text-sm font-bold">Company</h3>
                        <p class="text-sm text-gray-500">Please fill out all your personal details</p>
                    </div>

                    <div class="w-3/4 flex flex-wrap">

                        <div class="w-full">
                            <x-ui.form.field type="toggle" name="billing" label="Allow individual billing"
                                description="Allow each user to connect a bank account to receive the charged amount for their appointments directly." />
                        </div>
                        <div class="w-full">
                            <x-ui.form.field bold inline type="select" name="billing" label="Escrow"
                                :options="[['text'=>'Release immediately','id'=>'immediate'],['text'=>'Release at appointment conclusion','id'=>'conclusion'],['text'=>'Release after 14 days','id'=>'14-days']]" />
                        </div>
                        <div class="w-1/2">
                            <x-ui.form.field type="toggle" name="billing" label="Take a clip"
                                description="For users receiving payment directly take a clip of the payment" />
                        </div>
                        <div class="w-1/2 flex">
                            <div class="w-3/4">
                                <x-ui.form.field type="text" name="clip" label="Clip" bold inline />
                            </div>
                            <div class="w-1/4">$ / %</div>
                        </div>

                        <div class="w-full">
                            <x-ui.form.field bold inline type="select" name="billing" label="Disbursment"
                                :options="[['text'=>'Daily','id'=>'daily'],['text'=>'Weekly','id'=>'weekly'],['text'=>'Monthly','id'=>'monthly']]" />
                        </div>

                        <div class="w-full">
                            <x-ui.button.standard compact bold
                                wire:click="{{ $this->opens('App\Http\Livewire\Admin\Accounting\Register', [
    'user' => auth()->guard('admin')->user(),
]) }}">
                                Register
                            </x-ui.button.standard>
                        </div>

                    </div>



                </div>

                <hr class="border border-gray-200 my-10">

                <div class="flex">
                    <div class="w-1/4">
                        <h3 class="text-gray-700 text-sm font-bold">Indivudal</h3>
                        <p class="text-sm text-gray-500">Please fill out all your personal details</p>
                    </div>
                    <div class="w-3/4 flex flex-wrap">
                        <div class="w-full">
                            <x-ui.form.field bold inline type="select" name="billing" label="Disbursment"
                                :options="[['text'=>'Daily','id'=>'daily'],['text'=>'Weekly','id'=>'weekly'],['text'=>'Monthly','id'=>'monthly']]" />
                        </div>

                        <div class="w-full">
                            Bank details for company
                        </div>

                    </div>
                </div>

            </section>



        </div>




    </form>
</div>
