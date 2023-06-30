<x-layout>
    @section('title')
        @parent
        @if (isset($template)) <span class="flex items-center"><span class="block h-12 w-12 bg-gray-200 rounded-md mr-4"></span>{{ $template->name }}</span> @else Templates @endif
    @endsection
    <x-sidebar>
        <livewire:sidebar view="pages.templates.sidebar" model="\App\Models\Template" column="notification" />
    </x-sidebar>
    <x-main :action="$action??null" :method="$method??null">
        @yield('slot')
    </x-main>
</x-layout>
