<div class="rounded-md flex p-10 pb-5 flex-col">
    <div class="text-lg font-bold">
        {{ $attributes->get('title') ?? '' }}
    </div>
    <div class="text-xs text-gray-400 flex items-center h-6">
        <div class="flex space-x-4">
            {{ $information ?? '' }}
        </div>
        <div class="ml-auto">
            {{ $actions ?? '' }}
        </div>
    </div>
</div>
