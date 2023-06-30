<x-ui.form.field type="select" name="users" label="User" :value="$value??null"
    :options="\App\Models\User::all()->map(function($c){return ['id'=>$c->id,'text'=>$c->name];})" />
