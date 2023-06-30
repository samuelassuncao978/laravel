<div>
    @if(App\Policies\UserPolicy::viewWithheld(auth()->guard('admin')->user()))
    <div class="flex space-x-1 items-center text-gray-300">
        <span class="h-3 w-3 {{ $withheld ? '' : 'text-gray-600' }}"><x-icon.solid icon="eye"/></span>
        <x-ui.form.field type="toggle" name="withheld" color="bg-orange-400" model="withheld" inline />
        <span class="h-3 w-3 {{ $withheld ? 'text-orange-500' : '' }}"><x-icon.solid icon="trash"/></span>
    </div>
    @endif
</div>