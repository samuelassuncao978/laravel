@if (file_exists(resource_path('icons/files/' . $icon . '.svg')))
    @php
        include resource_path('icons/files/' . $icon . '.svg');
    @endphp
@endif
