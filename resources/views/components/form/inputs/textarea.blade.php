<x-form.label {{ $attributes }} />
<span {{ $attributes->only(['class','x-data','@click.away'])->class(['border-gray-300 focus-within:border-blue-400 focus-within:ring-blue-400'=> !$attributes->has('class') ])->merge(['class' => 'flex items-center justify-center relative text-sm border-2 bg-white outline-none focus-within:ring-2 focus-within:shadow-inner focus-within:ring-opacity-20 rounded transition-all ease-in-out duration-200 flex-1']) }}>
        <x-form.loading {{ $attributes }} />
        <x-form.prepend {{ $attributes }} />
            <textarea {{ $attributes->only(['x-bind:type','x-model','wire:model','autocomplete','autofocus']) }} id="{{ collect($attributes->only(['id','name','wire:model','label']))->first() }}"  class="outline-none bg-transparent px-4 p-2 flex-1 w-full {{ $attributes->has('rtl') ? 'text-right' : '' }}"></textarea>
        <x-form.append {{ $attributes }} />
        <x-form.privacy-barrier {{ $attributes }} />
    </span>
<x-form.inline-errors {{ $attributes }} />