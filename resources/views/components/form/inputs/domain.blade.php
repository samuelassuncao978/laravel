<x-form.label {{ $attributes }} />
<span {{ $attributes->only(['class','x-data','@click.away'])->class(['border-gray-300 focus-within:border-blue-400 focus-within:ring-blue-400'=> !$attributes->has('class') ])->merge(['class' => 'flex items-center justify-center relative border-2  bg-white outline-none focus-within:ring-2 focus-within:shadow-inner focus-within:ring-opacity-20 rounded transition-all ease-in-out duration-200 flex-1']) }}>
        <x-form.loading {{ $attributes }} />
        <x-form.prepend {{ $attributes }} />
        <span class="pointer-events-none ml-4 flex items-center justify-center text-xs text-gray-500">https://</span>


            <input   x-on:keypress="if ($event.key.replace(/[^\a-z\-.]/g,'')=='') $event.preventDefault();"  {{ $attributes->whereStartsWith('x-') }} {{ $attributes->only(['placeholder','x-model','wire:model','wire:model.debounce','wire:model.debounce.500ms','autocomplete','autofocus']) }} id="{{ collect($attributes->only(['id','name','wire:model','label']))->first() }}"  class="outline-none bg-transparent px-3 p-2 text-gray-700 flex-1 w-full text-lg md:text-sm {{ $attributes->has('rtl') ? 'text-right' : '' }}" />
        <x-form.append {{ $attributes }} />
        @if (isset($domain))
            <span class="pointer-events-none right-5 mr-4 flex items-center justify-center text-xs text-gray-500 flex-shrink-0">{{ $domain }}</span>
        @endif
        <x-form.privacy-barrier {{ $attributes }} />
    </span>
<x-form.inline-errors {{ $attributes }} />