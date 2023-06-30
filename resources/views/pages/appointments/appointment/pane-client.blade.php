<div class="w-1/3 flex overflow-hidden">
    <div class="flex flex-col flex-grow overflow-hidden">
        <x-modal.masthead title="Client">
            @slot('information')
                <div>
                    First seen:
                    <span class="text-blue-500">
                        @if ($first_appointment)
                            {{ optional($first_appointment->start_at)->format('jS F Y') }}
                        @else
                            Never
                        @endif
                    </span>
                </div>
                <div>Therapeutic Journey: <span class="text-blue-500">Exploration</span></div>
            @endslot
        </x-modal.masthead>



        <div
            class="flex flex-wrap overflow-auto flex-grow pt-5 bg-gray-50 border-t borrder-b border-gray-200 p-10 scrollbar scrollbar-thumb-gray-300">

     
            <div class="w-full divide-gray-200 divide-y">
                <div class="flex items-center mb-1">
                    <div class="w-32 uppercase tracking-wide text-gray-700 text-xs font-">Prefered name</div>
                    <x-field type="text" name="preferred_name"  wire:model="client.preferred_name" 
                         />
                </div>
                <div class="flex items-center mb-1 pt-1">

                    <div class="w-32 uppercase tracking-wide text-gray-700 text-xs font-">First name</div>
                    <x-field type="text" name="first_name"  required wire:model="client.first_name" 
                         />
                </div>
                <div class="flex items-center mb-1 pt-1">
                    <div class="w-32 uppercase tracking-wide text-gray-700 text-xs font-">Last name</div>
                    <x-field type="text" name="last_name"  required wire:model="client.last_name"   />
                </div>

                <div class="flex items-center mb-1 pt-1">
                    <div class="w-32 uppercase tracking-wide text-gray-700 text-xs font-">Date of birth</div>
                    <x-field type="date-of-birth" name="date_of_birth"  wire:model="client.date_of_birth"   />
                </div>


                <div class="flex items-center mb-1 pt-1">
                    <div class="w-32 uppercase tracking-wide text-gray-700 text-xs font-">Sex</div>
                    <x-field type="select"
                    default="Unspecified"
                        :options="[['text'=>'Unspecified','id'=>'Unspecified'],['text'=>'Male','id'=>'Male'],['text'=>'Female','id'=>'Female'],['text'=>'Intersex','id'=>'Intersex']]"
                        name="sex"  wire:model="client.sex" :private="$this->is_owned"   />
                </div>

                <div class="flex items-center mb-1 pt-1">
                    <div class="w-32 uppercase tracking-wide text-gray-700 text-xs font-">Pronouns</div>
                    <x-field type="select"
                        default="Unspecified"
                        :options="[['text'=>'Unspecified','id'=>'Unspecified'],['text'=>'He/Him','id'=>'He/Him'],['text'=>'She/Her','id'=>'She/Her'],['text'=>'They/Them','id'=>'They/Them']]"
                        extendable name="pronouns"  wire:model="client.pronouns"   />
                </div>

                <div class="flex items-center mb-1 pt-1">
                    <div class="w-32 uppercase tracking-wide text-gray-700 text-xs font-">Sexuality</div>
                    <x-field type="select" 
                        default="Unspecified"
                        :options="[['text'=>'Unspecified','id'=>'Unspecified'],['text'=>'Hetrosexual','id'=>'Hetrosexual'],['text'=>'Homosexual','id'=>'Homosexual'],['text'=>'Bisexual','id'=>'Bisexual']]"
                        extendable name="sexual_orientation"  wire:model="client.sexual_orientation" :private="$this->is_owned"   />
                </div>


                <div class="flex items-center mb-1 pt-1">
                    <div class="w-32 uppercase tracking-wide text-gray-700 text-xs font-">Occupation</div>
                    <x-field type="text" name="occupation" wire:model="client.occupation" />
                </div>

                <div class="flex items-center mb-1 pt-1">
                    <div class="w-32 uppercase tracking-wide text-gray-700 text-xs font-">Employer</div>
                    <x-field type="select" name="employer" wire:model="employer_id" :options="App\Models\Employer::all()->map(function($employer){ return ['text'=>$employer->name,'id'=>$employer->id]; })" extendable    />
                </div>


                <div class="flex items-center mb-1 pt-1">
                    <div class="w-32 uppercase tracking-wide text-gray-700 text-xs font-">Email</div>
                    <x-field type="text" name="email"   wire:model="client.email"  />
                </div>

                <div class="flex items-center mb-1 pt-1">
                    <div class="w-32 uppercase tracking-wide text-gray-700 text-xs font-">Phone</div>
                    <x-field type="phone" name="phone"   wire:model="client.phone"  />
                </div>

                <div class="flex items-center mb-1 pt-1">
                    <div class="w-32 uppercase tracking-wide text-gray-700 text-xs font-">Address</div>
                    <x-field type="address" name="address"   wire:model="client.address"  />
                </div>

                <div class="flex items-center mb-1 pt-1">
                    <div class="w-32 uppercase tracking-wide text-gray-700 text-xs font-">Doctor</div>
                    <x-field type="text" name="email" wire:model="client.doctor"   />
                </div>

                <div class="flex items-center mb-1 pt-1">
                    <div class="w-32 uppercase tracking-wide text-gray-700 text-xs font-">Next of Kin</div>
                    <x-field type="text" name="nok" wire:model="client.next_of_kin"    />
                </div>

                <div class="flex items-center mb-1 pt-1">
                    <div class="w-32 uppercase tracking-wide text-gray-700 text-xs font-">allergies</div>
                    <x-field type="textarea" name="alergy" wire:model="client.allergies"  :private="$this->is_owned"   />
                </div>

                <div class="flex items-center mb-1 pt-1">
                    <div class="w-32 uppercase tracking-wide text-gray-700 text-xs font-">Medication</div>
                    <x-field type="textarea" name="medication" wire:model="client.medication" :private="$this->is_owned"   />
                </div>


                <div class="flex items-center mb-1 pt-1">
                    <div class="w-32 uppercase tracking-wide text-gray-700 text-xs font-">Medicare</div>
                    <div class="flex flex-1">
                        <x-field type="text" name="medication" wire:model="client.medicare"    />
                    </div>
                </div>



            </div>



        </div>


    </div>
</div>
