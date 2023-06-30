@extends('layouts.authentication')
@section('slot')

<form wire:submit.prevent="save" class="flex flex-col max-w-sm w-full relative">
    <div class="text-3xl text-blue-600 mb-8">Sign in</div>
    <div class="flex flex-col space-y-4">
        <div class="flex flex-col">
            <x-field type="text" label="Email" wire:model="email" />
        </div>
        <div class="flex flex-col">
            <x-field type="password" label="Password" wire:model="password" />
        </div>
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <x-field type="checkbox" label="Remember me" />
            </div>
            <div class="text-xs">
                <x-link.primary href="/admin/forgot">
                    Forgot your password?
                </x-link.primary>
            </div>
        </div>
        <div class="flex items-center pt-4 space-x-4">
            <span><x-button.primary type="submit">Sign in</x-button.primary></span>
            <span class="text-gray-500">or</span>
            <span>
                <x-o-auth.authorize>
                        <x-button.secondary type="button" x-on:click="invoke('/ui/playground?start=true')"
                        > <x-o-auth.splash>
                                <x-ui.loading-indicator :loading="true" />
                            </x-o-auth.splash>
                            Login with SSO
                        </x-button.secondary>
                    </x-o-auth.authorize>
            </span>


            <!-- <span class="text-gray-500">or</span>
            <span class="font-semibold">
                <x-link.basic href="/register">
                    sign up here
                </x-link.basic>
            </span> -->
        </div>
    </div>
</form>

@endsection