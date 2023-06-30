<a x-data="{loading:false}" x-on:click="loading=true" {{ $attributes->except(['wire:loading','wire:target'])->class(['text-gray-500 hover:text-gray-700'=> !$attributes->has('class') ])->merge(['href' => '#','class' => 'inline-flex items-center justify-center relative outline-none hover:underline rounded transition-all ease-in-out duration-200']) }}>
    @if(!$attributes->has('target'))
    <span x-show="loading" class="h-3 w-3 mr-1 inline-block">
        <x-spinner />
    </span>
    @endif
    {{ $slot ?? '' }}
</a>


