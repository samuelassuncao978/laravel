@if (file_exists(resource_path('icons/custom/' . $icon . '.svg')))
    @php
        include resource_path('icons/custom/' . $icon . '.svg');
    @endphp
@endif
