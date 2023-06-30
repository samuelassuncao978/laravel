<x-ui.form.field type="select" name="companies" label="Company" :value="$value??null"
    :options="\App\Models\Company::all()->map(function($c){return ['id'=>$c->id,'text'=>$c->name];})" />
