
@aware([
    'label'
])
@if(isSet($label) && is_string($label)) 
    <span class="font-semibold text-gray-600 text-sm leading-loose select-none">{{ $label }}</span> 
@elseif(isSet($label))
    {{ $label }}
@endif