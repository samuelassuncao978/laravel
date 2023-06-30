<div class="flex w-full py-2 pr-2 text-xs space-x-1 justify-end">
    @if ($unread > 1)
        <button wire:click="mark_all_read()"
            class="rounded-full p-1 focus:outline-none hover:text-blue-500 text-gray-400 flex flex-shrink-0 px-2 pr-4 items-center">
            mark all read
        </button>
    @endif
    <button wire:click="$set('show_settings',{!! $show_settings ? 'false' : 'true' !!})"
        class="rounded-full p-1 bg-gray-200 hover:bg-gray-500 focus:outline-none hover:text-white text-gray-400 flex-shrink-0">
        <span class="h-4 w-4 flex-shrink-0 flex">
            <x-icon.solid icon="cog" />
        </span>
    </button>
</div>
