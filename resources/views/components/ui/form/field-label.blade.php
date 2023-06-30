@if ($attributes->has('label'))
    <label for="{{ $name ?? '' }}"
        class="flex items-cener uppercase tracking-wide text-gray-700 text-xs font-bold {{ $attributes->has('inline') ? 'mr-4' : 'mb-2' }}">
        {{ $attributes->get('label') }}
        @if (isset($errors) && isset($name))
            @error($name)
                <span class="text-xs font-medium tracking-wide text-yellow-600 pl-2 ml-auto block normal-case">
                    {{ $message }}
                </span>
            @enderror
        @endif
    </label>
@endif
