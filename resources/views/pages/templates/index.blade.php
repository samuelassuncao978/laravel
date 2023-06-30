@extends('pages.templates.layout',[ 'action'=>'/templates/1', 'method'=>'PATCH' ])
@section('title')

    <span class="flex items-center">
        <span class="flex flex-col items-center mr-4 w-12 h-12">
            <x-ui.avatar name="test" rounded="rounded-sm" long color="bg-gray-600" />
        </span>
        <span>
            Template edit
        </span>
    </span>

@endsection



@section('slot')









@endsection
