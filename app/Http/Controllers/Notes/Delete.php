<?php

namespace App\Http\Controllers\Notes;


use App\Models\Note;
use Sihq\Facades\Controller;
class Delete extends Controller
{

    public Note $note;

  
    public function onMount(){
        $props = request()->props;

        $this->note = Note::findOrFail(optional($props)['noteId']);
    }

    public function save(){
        $this->note->delete();
        $this->redirect('/notes/');
    }
}