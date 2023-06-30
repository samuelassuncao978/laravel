@php
$type = $attributes->has('outline') ? 'outline' : ($attributes->has('custom') ? 'custom' : 'solid');
$icons = array_diff(scandir(resource_path('icons/' . $type)), array_merge(['..', '.'], $allowed ?? []));
@endphp



<x-form.label {{ $attributes }} />
<div
x-init="!selected ? selected = '' : null"
x-data="{
    all: JSON.parse(atob('{{ base64_encode(json_encode($attributes->get('options')??[])) }}')),
    selected: @entangle($attributes->wire('model'))
}"


{{ $attributes->only(['class','x-data','@click.away'])->class(['border-gray-300 focus-within:border-blue-400 focus-within:ring-blue-400'=> !$attributes->has('class') ])->merge(['class' => 'flex h-60 overflow-hidden items-center justify-center relative text-sm border-2  bg-white outline-none focus-within:ring-2 focus-within:shadow-inner focus-within:ring-opacity-20 rounded transition-all ease-in-out duration-200 ']) }}>
    <div class="flex h-full flex-wrap flex-1 scrollbar p-4 px-2">
    @foreach ($icons as $key => $icon)
            <div wire:key="{{ $key }}" class="w-1/6 flex items-center justify-center ">
                <button type="button"
                    class="m-1 p-2 hover:bg-gray-200 hover:text-gray-700 flex-shrink-0 flex items-center justify-center text-gray-500 bg-gray-100 rounded w-10 h-10 focus:outline-none ring-2 ring-transparent border-2 border-white"
                    :class="{'ring-blue-500 text-blue-500': selected === ('{{ str_replace('.svg', '', $icon) }}') }"
                    x-on:click="selected = ('{{ str_replace('.svg', '', $icon) }}')">
                    
                    @if ($type === 'outline')
                        <x-icon.outline :icon="str_replace('.svg','',$icon)" />
                    @elseif ($type === 'custom')
                        <x-icon.custom :icon="str_replace('.svg','',$icon)" />
                    @else
                        <x-icon.solid :icon="str_replace('.svg','',$icon)" />
                    @endif
                </button>
            </div>
        @endforeach
    
    
    </div>
</div>


