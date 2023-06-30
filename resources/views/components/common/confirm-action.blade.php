<x-ui.modal.window {{ $attributes->merge(['class' => 'w-full md:w-1/3  md:max-w-full']) }}>
    <form class="flex flex-col items-center justify-center" method="{{ $method === 'GET' ? 'GET' : 'POST' }}"
        action="{{ $action }}">
        @csrf
        @if ($method !== 'GET' && $method !== 'POST')
            @method($method)
        @endif

        @if (isset($icon))
            <span class="block mx-auto h-16 w-16 mt-8 text-gray-600">{{ $icon }}</span>
        @endif
        <x-ui.modal.header :heading="$heading ?? null" :caption="$caption ?? null" :center="$icon ?? null"
            :color="$color ?? null" />

        <x-ui.modal.content>

            <div class="divide-y divide-gray-200">
                @if (isset($fields))
                    <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                        {{ $fields ?? '' }}
                    </div>
                @endif
            </div>

        </x-ui.modal.content>

        <x-ui.modal.actions>
            <span class="flex space-x-2">
                <x-ui.button.standard bold href="{{ $back }}">Cancel</x-ui.button.standard>
                <x-button.positive bold type="submit">{{ $submit ?? 'Submit' }}</x-button.positive>
            </span>

        </x-ui.modal.actions>
    </form>
</x-ui.modal.window>
