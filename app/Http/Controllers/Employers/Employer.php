<?php

namespace App\Http\Controllers\Employers;

use App\Models\Employer as EmployerModel;
use Sihq\Facades\Controller;
class Employer extends Controller
{

    public EmployerModel $employer;

    public function onMount(){
        $props = request()->props;
        $this->employer = EmployerModel::findOrFail(optional($props)['employerId']);

    }

}