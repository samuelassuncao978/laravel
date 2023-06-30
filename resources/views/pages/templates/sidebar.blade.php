<div class="flex flex-col h-full">
    <div class="sticky top-0 z-10 bg-gray-100 border-b border-gray-200">
        <x-interface.sidebar.header text="templates" create="/templates/create" />
        <x-interface.sidebar.search />
    </div>
    <x-interface.sidebar.item-list>
        @foreach ($results as $template)
            <x-interface.sidebar.item href="/templates/{{ $template->id }}">
                <x-interface.sidebar.item-header heading="{{ $template->notification }}"
                    :avatar="['name'=> $template->notification ]" />
            </x-interface.sidebar.item>
        @endforeach
    </x-interface.sidebar.item-list>
    {{ $results->onEachSide(1)->links('components.ui.pagination-simple') }}
</div>
