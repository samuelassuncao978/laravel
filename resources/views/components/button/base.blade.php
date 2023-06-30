<button {{ $attributes->except(['wire:loading','wire:target'])->merge(['type' => 'button','class' => 'py-3 px-8 font-semibold text-white flex justify-center items-center flex-grow focus:outline-none rounded focus:ring-4 relative overflow-hidden shadow active:shadow-inner transition-all ease-in-out duration-200']) }}>   
    <x-button.loading-indicator {{ $attributes }} />
    {{ $slot ?? '' }}
</button>