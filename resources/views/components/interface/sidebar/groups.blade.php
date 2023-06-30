<div class="my-4 px-5 flex items-center justify-center  z-10 ">

    <div class="bg-gray-200 text-xs text-gray-500 leading-none rounded-full inline-flex ">
        @foreach ($groups as $group)
            <button wire:click="  {{ $group['action'] ?? '' }}"
                class="inline-flex {{ !$group['active'] ?? false ? 'hover:text-blue-500 focus:text-blue-500 rounded-l-full' : 'bg-gray-500 text-white  rounded-full' }} items-center px-4 focus:outline-none py-1.5">
                {{ $group['text'] ?? '' }}
            </button>
        @endforeach
    </div>
</div>
