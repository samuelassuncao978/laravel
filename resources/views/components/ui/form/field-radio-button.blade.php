<div class="relative flex">
    {{ $slot ?? '' }}
    <input type="radio" x-model="selected" class="absolute inset-0 w-full h-full opacity-0 z-20" {{ $attributes->except('class') }} />
</div>
