<div {{ $attributes->only('class') }}>

    <span class="pointer-events-none ml-4 flex items-center justify-center text-xs text-gray-500">https://</span>

    <input type="{{ $type ?? '' }}" class="w-full bg-transparent font-bold focus:outline-none py-3 px-4 text-right"
        {{ $attributes->except('class') }}
        x-on:keypress="if ($event.key.replace(/[^\a-z\-.]/g,'')=='') $event.preventDefault();"
        />
    @if (isset($postfix))
        <span
            class="pointer-events-none right-5 mr-4 flex items-center justify-center text-xs text-gray-500 flex-shrink-0">{{ $postfix }}</span>
    @endif
</div>
