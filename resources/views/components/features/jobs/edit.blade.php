<x-common.confirm-action heading="Edit job" caption="Edit job details." submit="Save"
    back="{{ isset($cancel) ? $cancel : '/jobs/' . $job->id }}" action="/jobs/{{ $job->id }}" method="PATCH"
    color="bg-green-500">
    @slot('icon')
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
        </svg>
    @endslot
    @slot('fields')
        <x-data-attachments.projects :value="$projects ?? null" />

        <x-ui.form.field type="text" name="name" label="Name" :value="old('name')" />
    @endslot
</x-common.confirm-action>
