<div x-init="setTimeout( async () =>{ (await window.$twilio.applyVideoInputDeviceChange()).attach(document.querySelector('video#videoinputpreview')); },1000)"
    x-data="{ ready: false }"
    class="h-52 w-52 rounded shadow border-4  relative border-white bg-preview overflow-hidden flex items-center justify-center">
    <video wire:ignore id="videoinputpreview" x-on:canplay="ready = true;" class="h-full w-full object-cover rounded"
        autoplay></video>
    <div x-show="!ready" class="absolute inset-0 rounded overflow-hidden z-50">
        <x-ui.loading-indicator :loading="true" />
    </div>
</div>
