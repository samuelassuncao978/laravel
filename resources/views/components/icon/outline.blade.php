@if (file_exists(resource_path('icons/outline/' . $icon . '.svg')))
    @php
        include resource_path('icons/outline/' . $icon . '.svg');
    @endphp
@endif
