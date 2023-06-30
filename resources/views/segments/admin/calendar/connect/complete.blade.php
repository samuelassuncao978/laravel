<div class="flex-grow flex flex-col items-center justify-center bg-gray-100">
    <x-o-auth.authorize>
        <span class="flex" x-init="assert({ complete: true })">
            Authorization complete, You can now close this window.
        </span>
    </x-o-auth.authorize>
</div>
