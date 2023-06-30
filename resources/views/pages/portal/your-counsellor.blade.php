<div class="flex h-64 w-full lg:w-1/3 2xl:w-full 2xl:h-2/5 p-5 text-3xl">


    <div class="rounded-2xl flex-grow h-full relative group hover:scale-105 hover:shadow-2xl shadow-sm overflow-hidden transition-all ease-linear duration-100 transform scale-100 bg-gray-100 flex items-end bg-cover"
        style="background-image:url({{ $image ?? '' }});">
        <div
            class="inset-0 absolute bg-green-500 flex bg-opacity-50 group-hover:bg-opacity-30 transition-colors ease-linear duration-100">
        </div>
        <div
            class="p-5 {{ isset($pinned) ? '2xl:p-10' : '' }} flex-grow relative z-10 scrim-b-3/4 h-full flex flex-col overflow-hidden">
            <div class="text-xs text-white relative flex-grow z-10 truncate w-full flex flex-col items-center justify-center"
                style="text-shadow: 1px 1px rgba(0,0,0,0.5);">
                <div class="h-20 w-20">
                    <x-ui.avatar name="JA" />
                </div>
                Joel Anderson
            </div>

            <div class="flex items-end relative z-10">
                <div class=" text-white flex-1 line-clamp-2" style="text-shadow: 1px 1px rgba(0,0,0,0.5);">

                    Your counsellor
                </div>
                <div class="flex-shrink-0 flex items-end">
                    <span
                        class="{{ isset($pinned) ? 'h-12 w-12' : 'h-8 w-8' }} transition-all ease-linear duration-100 group-hover:bg-opacity-100 bg-green-500 bg-opacity-90 rounded-lg p-2 text-white">
                        <x-icon.solid icon="arrow-sm-right" />
                    </span>
                </div>
            </div>
        </div>
    </div>




</div>
