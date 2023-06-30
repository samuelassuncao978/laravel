@extends('layouts.authentication')
@section('slot')
       
        @if(!$this->user || $this->expires->isBefore(now()) )
            <div class="flex flex-col items-center justify-center relative  space-y-8">
                <div class="rounded-full border-8 border-gray-200 text-blue-500 p-8">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <div class="text-center max-w-sm">
                    <div class="font-semibold text-blue-500">Invaild link</div>
                    <div class="text-gray-500 text-sm mt-2">
                        This password reset link is no longer valid.
                    </div>
                    <div class="font-semibold pt-8">
                        <x-link.basic href="/">
                            back to login
                        </x-link.basic>
                    </div>
                </div>
            </div>
        @else
            <form wire:submit.prevent="save" class="flex flex-col max-w-sm w-full relative">
                <div class="text-3xl text-blue-600 mb-2">Hi Brad,</div>
                <div class="text-gray-500 text-sm mb-8">
                    Enter your new password below.
                </div>
                <div class="flex flex-col">
                    <div class="flex flex-col space-y-4">
                        <x-field type="password" label="Password" wire:model="password" />
                        <x-field type="password" label="Password (confirm)" wire:model="password_confirmation" />
                    </div>
                    
                    <div class="flex items-center pt-8 space-x-4">
                        <span><x-button.primary type="submit">Change password</x-button.primary></span>
                    </div>
                </div>
            </form>
        @endif
  
        @endsection