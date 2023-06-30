<div @click.away="open = false; {!! $attributes->has('onClickAway') ? $attributes->get('onClickAway') : '' !!}" x-cloak x-show="open"
    class="absolute right-0 mt-2 w-96 bg-white rounded-md overflow-hidden shadow-xl z-30">
    {{ $slot ?? '' }}
</div>
