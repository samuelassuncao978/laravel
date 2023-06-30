<div {{ $attributes->only('class') }}>
    <div class="relative flex w-full" x-data="{
              @if ($attributes->wire('model'))
        value: @entangle($attributes->wire('model')),
        @endif
        add: {!! in_array(
    $attributes->get('value'),
    collect($attributes->get('options') ?? [])->pluck('id')->values()->toArray(),
) || empty($attributes->get('value'))
    ? 'false'
    : ($attributes->has('extendable')
        ? 'true'
        : 'false') !!},
        previous: null,
        change($event){
        const addition = ($event.target.value === '--add' ? true : false);

        if(addition){
        $event.stopPropagation();
        this.add = addition;
        this.$nextTick(() => {
        this.$refs.custom.value = '';
        this.$refs.custom.focus();
        this.$refs.dropdown.selectedIndex = 0;
        });
        }else{
        @if ($attributes->has('wire:model'))
            $wire.set('{{ $attributes->get('wire:model') }}',$event.target.value)
        @elseif($attributes->has('wire:model.defer'))
            $wire.set('{{ $attributes->get('wire:model.defer') }}',$event.target.value)
        @endif
        }

        }
        }">

        <input x-ref="custom" x-show="add" type="text"
            class="bg-transparent w-full appearance-none focus:outline-none py-3 px-4"
            {{ $attributes->except(['class', 'multiple', 'options', 'extendable']) }} />
        <select
            {{ $attributes->except(['class', 'options', 'extendable', 'value', 'wire:model', 'wire:model.defer']) }}
            class="bg-transparent w-full appearance-none focus:outline-none py-3 px-4" x-show="!add" x-ref="dropdown"
            x-on:change="change">
            @foreach ($options ?? [] as $option)
                <option wire:key="{{ $option['id'] }}" value="{{ $option['id'] }}"
                    x-bind:selected="value === '{{ $option['id'] }}'">
                    {{ $option['text'] }}
                </option>
            @endforeach
            @if ($attributes->has('extendable'))
                <option wire:key="add" value="--add" class="font-bold">--- ADD ---</option>
            @endif
        </select>
        @if (!$attributes->has('multiple'))
            <svg x-show="!add" xmlns="http://www.w3.org/2000/svg"
                class="h-2/5 text-gray-400 top-1/2 transform -translate-y-1/2 right-3 absolute pointer-events-none"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
            </svg>
            <svg x-show="add" xmlns="http://www.w3.org/2000/svg" x-on:click="add = false"
                class="h-2/5 cursor-pointer text-gray-400 hover:text-gray-800 top-1/2 transform -translate-y-1/2 right-3 absolute"
                viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                    clip-rule="evenodd" />
            </svg>
        @endif
    </div>
</div>
