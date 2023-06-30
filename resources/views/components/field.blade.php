<label for="{{ collect($attributes->only(['id','name','wire:model','label']))->first() }}" class="flex flex-col flex-1">
    @switch($attributes->get('type'))
        @case('text')
            <x-form.inputs.textbox {{ $attributes }} />
            @break
        @case('textarea')
            <x-form.inputs.textarea {{ $attributes }} />
            @break
        @case('password')
            <x-form.inputs.password {{ $attributes }} />
            @break
        @case('domain')
            <x-form.inputs.domain {{ $attributes }} />
            @break
        @case('search')
            <x-form.inputs.search {{ $attributes }} />
            @break
        @case('currency')
            <x-form.inputs.currency {{ $attributes }}/>
            @break
        @case('percentage')
            <x-form.inputs.percentage {{ $attributes }} />
            @break
        @case('date-of-birth')
            <x-form.inputs.date-of-birth {{ $attributes }} />
            @break
        @case('date-range')
            <x-form.inputs.date-range {{ $attributes }} />
            @break
        @case('checkbox')
            <x-form.inputs.checkbox {{ $attributes }} />
            @break
        @case('radio')
            <x-form.inputs.radio {{ $attributes }} />
            @break
        @case('toggle')
            <x-form.inputs.toggle {{ $attributes }} />
            @break
        @case('phone')
            <x-form.inputs.phone {{ $attributes }} />
            @break
        @case('select')
            <x-form.inputs.select {{ $attributes }} />
            @break
        @case('date')
            <x-form.inputs.date {{ $attributes }} />
            @break
        @case('address')
            <x-form.inputs.address {{ $attributes }}/>
            @break
        @case('transfer')
            <x-form.inputs.transfer {{ $attributes }} />
            @break
         @case('icon')
            <x-form.inputs.icon {{ $attributes }}/>
            @break
    @endswitch
</label>

