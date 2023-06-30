<button wire:click="withTrashed" class="mt-4 block text-center text-xs mx-auto text-gray-400 hover:text-blue-500">&mdash;
    {{ $trashed ? 'Hide' : 'Show' }} {{ $text ?? '' }} &mdash;</button>
