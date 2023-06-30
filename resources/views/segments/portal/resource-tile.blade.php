<div wire:click="{{ $click ?? null }}"
    class="rounded-2xl flex-grow h-full relative group hover:scale-105 hover:shadow-2xl shadow-sm overflow-hidden transition-all ease-linear duration-100 transform scale-100 bg-gray-100 flex items-end bg-cover"
    style="background-image:url({{ $image ?? '' }});">

    @php
        
        $categories = [
            'stress' => 'bg-purple-500',
            'sleep' => 'bg-blue-500',
            'anxiety' => 'bg-yellow-500',
            'fitness' => 'bg-red-500',
            'metitation' => 'bg-green-500',
            'reflection' => 'bg-teal-500',
            'other' => 'bg-lime-500',
        ];
        
        if (!isset($color) && isset($category)) {
            $color = optional($categories)[$category];
        }
        
    @endphp


    <div
        class="inset-0 absolute {{ $color ?? '' }} flex bg-opacity-50 group-hover:bg-opacity-30 transition-colors ease-linear duration-100">
    </div>
    <div class="p-5 {{ isset($pinned) ? '2xl:p-10' : '' }}  relative z-10 w-full  overflow-hidden">
        <div class="text-xs text-white relative z-10 w-full overflow-hidden"
            style="text-shadow: 1px 1px rgba(0,0,0,0.5);">
            {{ $category ?? '' }}
        </div>
        <div class="flex items-end relative z-10">
            <div class=" text-white flex-1 line-clamp-2" style="text-shadow: 1px 1px rgba(0,0,0,0.5);">
                {{ $title ?? '' }}
            </div>
            <div class="flex-shrink-0 flex items-end">
                <span
                    class="{{ isset($pinned) ? 'h-12 w-12' : 'h-8 w-8' }} transition-all ease-linear duration-100 group-hover:bg-opacity-100 {{ $color ?? '' }} bg-opacity-90 rounded-lg p-2 text-white">
                    <x-icon.solid icon="arrow-sm-right" />
                </span>
            </div>
        </div>
    </div>
    <div class="absolute inset-0 rounded overflow-hidden z-10" wire:loading wire:target="{{ $click ?? null }}">
        <x-ui.loading-indicator :loading="true" bg="bg-white bg-opacity-10" spinner="border-white-500" />
    </div>
</div>
