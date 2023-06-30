<div {{ $attributes->only('class') }}>
    <input
        type="{{ $attributes->has('time') ? 'datetime-local' : 'date' }}"

        x-data="{picker:null}"

        value="{{ optional($attributes->get('value'))->format('Y-m-d\TH:m:s') ?? ''  }}"

        x-on:change="



        $wire.set('{{ $attributes->get('wire:model') }}',new Date($event.target.value.replace('T',' ').replace('-','/')).toISOString(),true)"

        class="bg-transparent focus:outline-none flex-grow py-3 px-4" {{ $attributes->except(['class','value','wire:model']) }} />

    <!-- <div class="flex overflow-hidden items-center w-full py-2.5 px-4 space-x-2"
        x-data="{day: '', month: '', year: '', value: '', onChange(){
            const date = new Date(`${this.month}/${this.day}/${this.year}`).toString();
            if(date !== 'Invalid Date'){
                $dispatch('input', date);
                this.value = date; console.log(this.value)
            }
        }}">
        <input type="text" maxlength="2" x-model="day" x-on:keyup="onChange" class="flex-1 text-center box-border w-1/4 bg-transparent focus:outline-none bg-gray-50 rounded p-0.5"/>
        <span class="text-xs text-gray-400">/</span>
        <input type="text" maxlength="2" x-model="month" x-on:keyup="onChange" class="flex-1 text-center box-border w-1/4 bg-transparent focus:outline-none bg-gray-50 rounded p-0.5"/>
        <span class="text-xs text-gray-400">/</span>
        <input type="text" maxlength="4" x-model="year" x-on:keyup="onChange" class="flex-1 text-center box-border w-2/4 bg-transparent focus:outline-none bg-gray-50 rounded p-0.5"/>
    </div> -->

</div>
