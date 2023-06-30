<form wire:submit.prevent="save" class="flex flex-col flex-grow overflow-hidden ">



    <div class="sm:px-7 -mb-0.5 px-4 relative z-10 flex items-center bg-gray-50 py-3 border-b border-gray-200">

        <div class="inline-block ml-auto">
            <x-button.positive compact bold type="submit">
                Save changes
            </x-button.positive>
        </div>
    </div>
    @if ($client->users()->count() > 1)
        <div class="p-4 bg-yellow-50 border-b border-yellow-200 text-xs text-yellow-600">
            <span class=" px-5 flex items-center">
                <span class="h-10 w-10 mr-2 flex-shrink-0">
                    <x-icon.solid icon="identification" />
                </span>
                <div class="flex flex-col flex-grow max-w-3xl">
                    <span class="font-bold">Shared profile</span>
                    This client has authorised other counsellors access to thier profile. Any information changes or
                    additions will also be shared with our counsellors. Files, Therepy notes, Appointments &amp; Billing
                    will not be shared.
                </div>
            </span>
        </div>
    @endif


    <div class="scroll-shadow relative overflow-hidden" x-data="scroll_shadow()" x-init="init()">
        <div class="overflow-y-scroll scrollbar scrollbar-thumb-gray-500 h-full" x-ref="content">

            <div class="flex p-10">

                <section class="container mx-auto pt-10 divide-y divide-gray-200">

                    <div class="flex py-8">
                        <div class="w-1/5 mr-5">
                            <h3 class="text-gray-700 text-sm font-bold"></h3>
                            <p class="text-sm text-gray-500">Please fill out all your personal details</p>
                        </div>

                        <div class="w-2/5">
                            <div class="flex">
                                <x-ui.form.field type="text" name="preferred_name" label="preferred name" bold
                                    model="client.preferred_name" />
                                <x-ui.form.field type="date" name="date_of_birth" label="Date of birth" bold
                                    model="client.date_of_birth" />
                            </div>
                            <div class="flex">
                                <x-ui.form.field type="text" name="first_name" label="First name" bold required
                                    model="client.first_name" />
                                <x-ui.form.field type="text" name="last_name" label="Last Name" bold required
                                    model="client.last_name" />
                            </div>

                            <div class="flex">
                                <div class="w-1/4">
                                    <x-ui.form.field type="select"
                                        :options="[['text'=>'Unspecified','id'=>'Unspecified'],['text'=>'Male','id'=>'Male'],['text'=>'Female','id'=>'Female'],['text'=>'Intersex','id'=>'Intersex']]"
                                        name="sex" label="Sex" bold model="client.sex" />
                                </div>
                                <div class="flex w-3/4">
                                    <div class="w-1/2">
                                        <x-ui.form.field type="select"
                                            :options="[['text'=>'Unspecified','id'=>'Unspecified'],['text'=>'He/Him','id'=>'He/Him'],['text'=>'She/Her','id'=>'She/Her'],['text'=>'They/Them','id'=>'They/Them']]"
                                            extendable name="pronouns" label="Pronouns" bold model="client.pronouns" />
                                    </div>
                                    <div class="w-1/2">
                                        <x-ui.form.field type="select"
                                            :options="[['text'=>'Unspecified','id'=>'Unspecified'],['text'=>'Hetrosexual','id'=>'Hetrosexual'],['text'=>'Homosexual','id'=>'Homosexual'],['text'=>'Bisexual','id'=>'Bisexual']]"
                                            extendable name="sexual_orientation" label="Sexual Orientation" bold
                                            model="client.sexual_orientation" />
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="w-2/5">
                            <div class="flex">
                                <div class="w-1/2">
                                    <x-ui.form.field type="file" name="client.photo" label="Photo" bold
                                        model="client.photo" />
                                </div>
                            </div>
                            <div class="flex">
                                <x-ui.form.field type="text" name="occupation" label="Occupation" bold />
                                <x-ui.form.field type="text" name="employer" label="Employer" bold />
                            </div>
                        </div>
                    </div>

                    <div class="flex py-8">
                        <div class="w-1/5 mr-5">
                            <h3 class="text-gray-700 text-sm font-bold">Contact Details</h3>
                            <p class="text-sm text-gray-500">Please fill out all your personal details</p>
                        </div>

                        <div class="w-2/5 ">
                            <div class="flex">
                                <x-ui.form.field type="text" name="email" label="Email" bold model="client.email" />
                            </div>

                        </div>

                        <div class="w-2/5">
                            <div class="flex">
                                <x-ui.form.field type="phone" name="phone" label="Phone" bold model="client.phone" />
                            </div>



                        </div>
                    </div>

                    <div class="flex py-8">
                        <div class="w-1/5 mr-5">
                            <h3 class="text-gray-700 text-sm font-bold">Healthcare details</h3>
                            <p class="text-sm text-gray-500">Please fill out all your personal details</p>
                        </div>

                        <div class="w-4/5 flex">

                            <div class="w-1/3">
                                <div class="flex">
                                    <x-ui.form.field type="text" name="doctor" label="Doctor" bold />
                                </div>
                                <div class="flex">
                                    <x-ui.form.field type="text" name="phone" label="Next of kin" bold />
                                </div>
                            </div>
                            <div class="w-1/3 ">
                                <div class="flex h-full">
                                    <x-ui.form.field type="textarea" name="allergies" label="Allergies" bold />
                                </div>
                            </div>
                            <div class="w-1/3 ">
                                <div class="flex h-full">
                                    <x-ui.form.field type="textarea" name="medication" label="Medication" bold />
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="flex py-8">
                        <div class="w-1/5 mr-5">
                            <h3 class="text-gray-700 text-sm font-bold">Healthcare funds</h3>
                            <p class="text-sm text-gray-500">Please fill out all your personal details</p>
                        </div>

                        <div class="w-4/5 flex">

                            <div class="w-1/3">
                                <div class="flex">
                                    <div class="w-3/4">
                                        <x-ui.form.field type="text" name="medicare" label="Medicare" bold />
                                    </div>
                                    <div class="w-1/4">
                                        <x-ui.form.field type="select" name="irn" label="IRN" bold />
                                    </div>
                                </div>
                                <div class="flex">

                                    <x-ui.form.field type="text" name="date" label="Expiry date" bold />

                                </div>
                            </div>
                            <div class="w-1/3">
                                <div class="flex h-full">
                                    <x-ui.form.field type="text" name="allergies" label="Department of vetrans affairs"
                                        bold />
                                </div>
                            </div>
                            <div class="w-1/3 ">
                                <div class="flex">
                                    <x-ui.form.field type="text" name="medication" label="Private health" bold />
                                </div>
                                <x-ui.form.field type="text" name="medication" label="Membership number" bold />
                            </div>
                        </div>

                    </div>


                    <div class="flex py-8">
                        <div class="w-1/4">
                            <h3 class="text-gray-700 text-sm font-bold">Notification preferences</h3>
                            <p class="text-sm text-gray-500">Please fill out all your personal details</p>
                        </div>

                        <div class="w-1/4  space-y-3">

                            <div class="flex space-x-3 items-center" x-data="{toggle: '0'}">
                                <div class="relative rounded-full w-12 h-6 transition duration-200 ease-linear"
                                    :class="[toggle === '1' ? 'bg-green-400' : 'bg-gray-400']">
                                    <label for="toggle"
                                        class="absolute left-0 bg-white border-2 mb-2 w-6 h-6 rounded-full transition transform duration-100 ease-linear cursor-pointer"
                                        :class="[toggle === '1' ? 'translate-x-full border-green-400' : 'translate-x-0 border-gray-400']"></label>
                                    <input type="checkbox" id="toggle" name="toggle"
                                        class="appearance-none w-full h-full active:outline-none focus:outline-none"
                                        @click="toggle === '0' ? toggle = '1' : toggle = '0'" />
                                </div>
                                <div class="text-gray-700 font-semibold">Notification one</div>
                            </div>

                            <div class="flex space-x-3 items-center" x-data="{toggle: '0'}">
                                <div class="relative rounded-full w-12 h-6 transition duration-200 ease-linear"
                                    :class="[toggle === '1' ? 'bg-green-400' : 'bg-gray-400']">
                                    <label for="toggle3"
                                        class="absolute left-0 bg-white border-2 mb-2 w-6 h-6 rounded-full transition transform duration-100 ease-linear cursor-pointer"
                                        :class="[toggle === '1' ? 'translate-x-full border-green-400' : 'translate-x-0 border-gray-400']"></label>
                                    <input type="checkbox" id="toggle3" name="toggle"
                                        class="appearance-none w-full h-full active:outline-none focus:outline-none"
                                        @click="toggle === '0' ? toggle = '1' : toggle = '0'" />
                                </div>
                                <div class="text-gray-700 font-semibold">Notification one</div>
                            </div>

                        </div>

                        <div class="w-1/4">




                        </div>

                    </div>

                </section>

            </div>
        </div>
    </div>

</form>
