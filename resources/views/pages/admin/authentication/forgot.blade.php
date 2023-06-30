@extends('layouts.authentication')
@section('slot')
        @if(!$complete)
       
        <form wire:submit.prevent="save" class="flex flex-col max-w-sm w-full relative">
            <div class="text-3xl text-blue-600 mb-8">Forgot password</div>
            <div class="flex flex-col">
                <div class="flex flex-col">
                    <x-field type="text" label="Email" wire:model="email" />
                </div>
                <div class="flex items-center pt-8 space-x-4">
                    <span><x-button.primary type="submit">Reset</x-button.primary></span>
                    <span class="text-gray-500">or</span>
                    <span class="font-semibold">
                        <x-link.basic href="/">
                            back to login
                        </x-link.basic>
                   </span>
                </div>
            </div>
        </form>
        @else
            <div class="flex flex-col items-center justify-center relative  space-y-8">
                <div class="rounded-full border-8 border-gray-200 text-blue-500 p-8">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <div class="text-center max-w-sm">
                    <div class="font-semibold text-blue-500">Check you email!</div>
                    <div class="text-gray-500 text-sm mt-2">
                        We have sent you an email to reset your account.
                    </div>
                    <div class="text-xs text-gray-500">
                        If you do not receive the email at <span class="font-mono">'{{ $email }}'</span> please feel free to contact support <x-link.basic href="/support">here</x-link.basic>
                    </div>
                    <div class="font-semibold pt-8">
                        <x-link.basic href="/">
                            back to login
                        </x-link.basic>
                    </div>
                </div>
            </div>
        @endif
@endsection