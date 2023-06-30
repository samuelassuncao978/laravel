<x-common.confirm-action :heading="isSet($user) ? 'Edit user' : 'Create user'"
    :caption="isSet($user) ? 'Edit user details' : 'Create user'" :submit="isSet($user) ? 'Save' : 'Create'"
    :back="isSet($user) ? '/users/'.$user->id : '/users'" :action="isSet($user) ? '/users/'.$user->id : '/users'"
    :method="isSet($user) ? 'PATCH' : 'POST'" color="bg-green-500">
    @slot('fields')
        <x-ui.form.field type="text" name="name" label="Name" :value="old('name', optional($user??[])->name)"
            :autofocus="true" required />
        <x-ui.form.field type="text" name="email" label="Email" :value="old('email', optional($user??[])->email)"
            :autofocus="true" required />
    @endslot
</x-common.confirm-action>
