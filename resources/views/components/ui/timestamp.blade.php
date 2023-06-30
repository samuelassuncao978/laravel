@php
$date = new \Carbon\Carbon($date);
@endphp
<span title="{{ $date->diffForHumans() }}" {{ $attributes }}>
    {{ $date->format(isset($local) && $local !== true ? $local : 'Y-m-d H:i:s') }}
</span>
