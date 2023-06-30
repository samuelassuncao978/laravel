@props(['errors'])

@if ($errors->any() && true === false)
    <div {{ $attributes }}>
        <div class="font-medium text-xs text-center block text-red-700 pb-5">
            {{ __('Whoops! Something went wrong.') }}
        </div>
        <!-- <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul> -->
    </div>
@endif
