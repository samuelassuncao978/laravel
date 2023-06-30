<div {{ $attributes->merge(['x-cloak'=>true,'@click.away'=>'contextMenu = false','x-show' => 'contextMenu','class' => 'z-5 absolute right-0 mt-2 py-2 w-48 bg-white rounded-md shadow-xl border border-gray-200 z-30']) }}>
    {{ $slot ?? '' }}
</div>