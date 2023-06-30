<div x-init=" (await window.$twilio.applyVideoInputDeviceChange()).attach(document.querySelector('video#preview95')); "
    x-data="{ ready: false }"
    class="h-52 w-52 rounded shadow border-4  absolute top-10 right-10 border-white bg-preview overflow-hidden flex items-center justify-center">
    <video wire:ignore id="preview95" x-on:canplay="ready = true;" class="h-full w-full object-cover rounded"
        autoplay></video>
    <div x-show="!ready" class="absolute inset-0 rounded overflow-hidden z-50">
        <x-ui.loading-indicator :loading="true" />
    </div>
</div>
