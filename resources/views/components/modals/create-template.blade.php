<x-common.confirm-action :heading="isSet($template) ? 'Edit template' : 'Create template'"
    :caption="isSet($template) ? 'Edit template details' : 'Create template'"
    :submit="isSet($template) ? 'Save' : 'Create'" :back="isSet($template) ? '/templates/'.$template->id : '/templates'"
    :action="isSet($template) ? '/templates/'.$template->id : '/templates'"
    :method="isSet($template) ? 'PATCH' : 'POST'" color="bg-green-500">
    @slot('fields')
        <x-ui.form.field type="text" name="notification" label="Notification"
            :value="old('notification', optional($template??[])->notification)" :autofocus="true" required />
    @endslot
</x-common.confirm-action>
