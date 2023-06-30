<div class="flex-grow flex flex-col items-center justify-center bg-gray-100">
   <span class="flex" wire:init="start_sync">
        <x-ui.loading-indicator :loading="true" spinner="border-gray-500" bg="bg-gray-300 bg-opacity-25" />
        <span class="pt-20">Completing first calendar sync...</span>
    </span>
</div>
