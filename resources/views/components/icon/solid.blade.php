@if (file_exists(resource_path('icons/solid/' . $icon . '.svg')))
    @php
        include resource_path('icons/solid/' . $icon . '.svg');
    @endphp
@endif
