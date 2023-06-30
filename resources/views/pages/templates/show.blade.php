@extends('pages.templates.layout',[ 'action'=>'/templates/'.$template->id, 'method'=>'PATCH' ])


@section('actions')
    <div class="inline-block ml-auto">
        <x-button.positive bold type="submit">
            Save changes
        </x-button.positive>
    </div>
@endsection
@section('slot')



    <div class=" relative overflow-hidden w-full h-full flex">


        <div class="mx-auto container px-20 py-10">
            <div class="bg-white border shadow-lg border-gray-200 rounded-xl h-full overflow-hidden flex flex-col">

                <div class="flex flex-col shadow relative bg-gradient-to-b px-5 p-3 space-y-2 from-gray-50 to-gray-100">

                    <div class="flex items-center w-full">
                        <div class="mr-4 w-16 text-right text-gray-500">Subject:</div>
                        <div class="border flex-grow border-black border-opacity-5 rounded-md overflow-hidden shadow-sm">
                            <div class="bg-gradient-to-b from-white to-gray-50 text-sm py-2.5 px-5 text-left">
                                workcation.com
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center w-full">
                        <div class="mr-4  w-16 text-right text-gray-500">cc:</div>
                        <div class="border flex-grow border-black border-opacity-5 rounded-md overflow-hidden shadow-sm">
                            <div class="bg-gradient-to-b from-white to-gray-50 text-sm py-2.5 px-5 text-left">
                                workcation.com
                            </div>
                        </div>
                        <div class="mr-4 w-16 text-right text-gray-500">bcc:</div>
                        <div class="border flex-grow border-black border-opacity-5 rounded-md overflow-hidden shadow-sm">
                            <div class="bg-gradient-to-b from-white to-gray-50 text-sm py-2.5 px-5 text-left">
                                workcation.com
                            </div>
                        </div>
                    </div>


                </div>
                <div class="flex-grow shadow-inner ">



                    <x-ui.form.field-editor id="template" name="template" :value="$template->template">

                    </x-ui.form.field-editor>


                </div>
            </div>
        </div>



    </div>





@endsection
