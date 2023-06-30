@php
$props = collect([]);
if ($attributes->has('model')) {
    $model = $attributes->get('model');
    if ($attributes->has('defer')) {
        $props->put('wire:model.defer', is_string($model) ? $model : 'form.' . $name);
    } else {
        $props->put('wire:model', is_string($model) ? $model : 'form.' . $name);
    }
    if ($attributes->has('name')) {
        if (is_string($model)) {
            $value = optional(\Arr::dot((array) $this))[$model];
            $props->put('value', old($attributes->get('name'), $value ?? ($attributes->get('value') ?? null)));
        } else {
            $value = optional(optional($this)->form)[(string) $attributes->get('name')];
            $props->put('value', old($attributes->get('name'), $value ?? ($attributes->get('value') ?? null)));
        }
    }
} else {
    if ($attributes->has('name')) {
        $props->put('value', old($attributes->get('name'), $attributes->get('value') ?? null));
    }
}

if ($attributes->has('name')) {
    $props->put('id', $attributes->get('name'));
    $props->put('name', $attributes->get('name'));
}

if ($attributes->has('strenght')) {
    $props->put('strenght', $attributes->get('strenght'));
}

if ($attributes->has('options')) {
    $props->put('options', $attributes->get('options'));
}
if ($attributes->has('multiple')) {
    $props->put('multiple', $attributes->get('multiple'));
}
if ($attributes->has('extendable')) {
    $props->put('extendable', $attributes->get('extendable'));
}
if ($attributes->has('required')) {
    $props->put('required', $attributes->get('required'));
}
if ($attributes->has('autofocus')) {
    $props->put('autofocus', $attributes->get('autofocus'));
}
if ($attributes->has('autocomplete')) {
    $props->put('autocomplete', $attributes->get('autocomplete'));
}
if ($attributes->has('time')) {
    $props->put('time', $attributes->get('time'));
}
if ($attributes->has('min')) {
    $props->put('min', $attributes->get('min'));
}
if ($attributes->has('max')) {
    $props->put('max', $attributes->get('max'));
}
if ($attributes->has('inline')) {
    $props->put('inline', $attributes->get('inline'));
}

if ($attributes->has('label')) {
    $props->put('label', $attributes->get('label'));
}
if ($attributes->has('description')) {
    $props->put('description', $attributes->get('description'));
}

if ($attributes->has('custom')) {
    $props->put('custom', $attributes->get('custom'));
}

if ($attributes->has('postfix')) {
    $props->put('postfix', $attributes->get('postfix'));
}

if ($attributes->has('color')) {
    $props->put('color', $attributes->get('color'));
}

$props->put('class', 'flex relative text-sm flex-grow focus-within:ring-2 focus-within:shadow-inner shadow-sm ring-gray-300 focus-within:border-gray-400 block bg-white text-gray-500 border border-gray-100 rounded');

if ($attributes->has('bold')) {
    $props->put('class', 'flex relative text-sm bg-gray-200 flex-grow border-2 border-gray-200 rounded text-gray-700 leading-tight focus-within:outline-none focus-within:bg-white focus-within:border-gray-500');
}

$attributes->setAttributes($props->toArray());

@endphp


<div class="@if ($type !== 'hidden')flex {{ $attributes->has('inline') ? 'items-center' : 'flex-col p-3' }} space-y-1 flex-grow rounded-md border border-transparent @if (isset($errors) && isset($name)) @error($name) border-yellow-200 bg-yellow-50 @enderror @endif    @endif">
    @if ($type === 'text' || $type === 'email' || $type === 'hidden')
        <x-ui.form.field-label {{ $attributes }} />
        <div {{ $attributes->only('class') }}>
            <input type="{{ $type ?? '' }}" class="w-full bg-transparent focus:outline-none py-3 px-4"
                {{ $attributes->except('class') }} />
        </div>
    @elseif ($type === 'textarea')
        <x-ui.form.field-label {{ $attributes }} />
        <div {{ $attributes->only('class') }}>
            <textarea type="{{ $type ?? '' }}" class="w-full bg-transparent focus:outline-none py-3 px-4"
                {{ $attributes->except('class') }}></textarea>
        </div>
    @elseif ($type === 'domain')
        <x-ui.form.field-label {{ $attributes }} />
        <x-ui.form.field-domain {{ $attributes }} />
    @elseif ($type === 'toggle')
        <x-ui.form.field-toggle {{ $attributes }} />
    @elseif ($type === 'radio')
        <x-ui.form.field-radio {{ $attributes }} />
    @elseif ($type === 'checkbox')
        <x-ui.form.field-checkbox {{ $attributes }} />
    @elseif ($type === 'file')
        <x-ui.form.field-label {{ $attributes }} />
        <x-ui.form.field-file {{ $attributes }} />
    @elseif ($type === 'currency')
        <x-ui.form.field-label {{ $attributes }} />
        <x-ui.form.field-currency {{ $attributes }} />
    @elseif ($type === 'radio-button')
        <x-ui.form.field-radio-button {{ $attributes }}>
            {{ $slot ?? ''}}
        </x-ui.form.field-radio-button>
    @elseif ($type === 'percentage')
        <x-ui.form.field-label {{ $attributes }} />
        <x-ui.form.field-percentage {{ $attributes }} />
    @elseif ($type === 'search-select')
        <x-ui.form.field-label {{ $attributes }} />
        <x-ui.form.field-search-select {{ $attributes }} />
    @elseif ($type === 'icon')
        <x-ui.form.field-label {{ $attributes }} />
        <x-ui.form.field-icon {{ $attributes }} />
    @elseif ($type === 'select-remote')
        <x-ui.form.field-label {{ $attributes }} />
        <x-ui.form.field-select-remote {{ $attributes }} />
    @elseif ($type === 'select')
        <x-ui.form.field-label {{ $attributes }} />
        <x-ui.form.field-select {{ $attributes }} />
    @elseif ($type === 'editor')
        <x-ui.form.field-label {{ $attributes }} />
        <x-ui.form.field-editor {{ $attributes }} />
    @elseif ($type === 'phone')
        <x-ui.form.field-label {{ $attributes }} />
        <x-ui.form.field-phone {{ $attributes }} />
    @elseif ($type === 'password')
        <x-ui.form.field-label {{ $attributes }} />
        <x-ui.form.field-password {{ $attributes }} />
    @elseif ($type === 'address')
        <x-ui.form.field-label {{ $attributes }} />
        <x-ui.form.field-address {{ $attributes }} />
    @elseif ($type === 'date')
        <x-ui.form.field-label {{ $attributes }} />
        <x-ui.form.field-date {{ $attributes }} />
    @elseif ($type === 'color')
        <x-ui.form.field-label {{ $attributes }} />
        <x-ui.form.field-color {{ $attributes }} />
    @elseif ($type === 'location')
        <x-ui.form.field-label {{ $attributes }} />
        <x-ui.form.field-location {{ $attributes }} />
    @else
        <x-ui.form.field-label {{ $attributes }} />
        <div {{ $attributes->only('class') }}>
            {{ $slot }}
        </div>
    @endif
</div>
