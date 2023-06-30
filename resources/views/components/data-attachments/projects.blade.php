<x-ui.form.field type="select" name="projects" label="Project" :value="$value??null"
    :options="\App\Models\Project::all()->map(function($c){return ['id'=>$c->id,'text'=>$c->name];})" />
