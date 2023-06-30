<x-common.confirm-action heading="Create job" caption="Create a new job." submit="Create"
    back="{{ isset($cancel) ? $cancel : '/jobs' }}" action="/jobs" method="POST" color="bg-green-500">


    @slot('fields')

        <x-ui.form.field type="select" name="projects" label="Project" :value="$projects??null"
            :options="\App\Models\Project::all()->map(function($c){return ['id'=>$c->id,'text'=>$c->name];})" />

        <x-ui.form.field type="text" name="name" label="Name" :value="old('name')" />
    @endslot
</x-common.confirm-action>
