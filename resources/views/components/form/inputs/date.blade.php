

<x-form.label {{ $attributes }} />
    <span {{ $attributes->only(['class','x-data','@click.away'])->class(['border-gray-300 focus-within:border-blue-400 focus-within:ring-blue-400'=> !$attributes->has('class') ])->merge(['class' => 'flex items-center justify-center relative border-2  bg-white outline-none focus-within:ring-2 focus-within:shadow-inner focus-within:ring-opacity-20 rounded transition-all ease-in-out duration-200 flex-1']) }}>
        <x-form.loading {{ $attributes }} />
            <!-- <span class="flex flex-shrink-0 items-center justify-center mr-4 text-gray-400 font-bold">
                <span class="h-4 w-4"><x-icon.solid icon="calendar" /></span>
            </span> -->
            <input type="date"  {{ $attributes->whereStartsWith('x-') }} {{ $attributes->only(['placeholder','x-model','wire:model','wire:model.debounce','wire:model.debounce.500ms','autocomplete','autofocus']) }} id="{{ collect($attributes->only(['id','name','wire:model','label']))->first() }}"  class="outline-none bg-transparent px-3 p-2 text-gray-700 flex-1 w-full text-lg md:text-sm {{ $attributes->has('rtl') ? 'text-right' : '' }}" />
        <x-form.append {{ $attributes }} />
    </span>
<x-form.inline-errors {{ $attributes }} />

<div class="relative hidden" x-data="{ open: true, tab: 'date', year:2021 }">

    <div  class="fixed inset-0 z-20 overflow-y-auto sm:absolute sm:inset-auto sm:top-10 sm:mt-1 sm:right-0 bg-red-500"
            x-cloak
            x-show="open"
            x-on:click.outside="open=false"
            x-on:keydown.escape.window="open=false">
        <div class="flex items-end justify-center min-h-screen sm:h-96 sm:items-start" style="min-height: -webkit-fill-available; min-height: fill-available;">   
            <!-- Backdrop on mobile -->
            <div class="fixed inset-0 bg-secondary-400 bg-opacity-60 transition-opacity sm:hidden" x-on:click="closePicker"></div>


            <div class="w-full rounded-t-md border border-secondary-200 bg-white transform shadow-lg transition-all relative max-h-96 overflow-y-auto p-3 sm:w-72 sm:rounded-xl">
               
                <div class="flex items-center justify-between">
                    <button class="p-2 flex items-center justify-center">
                        <span class="h-5 w-5"><x-icon.solid icon="chevron-left" /></span>
                    </button>

                    <div class="w-full flex items-center justify-center gap-x-2 text-secondary-600">
                        <button class="focus:outline-none focus:underline" type="button">
                            January
                        </button>
                        <input class="w-10 sm:w-14 appearance-none p-0 ring-0 border-none focus:ring-0 focus:outline-none" x-model="year" type="number" />
                    </div>
                    <button class="p-2 flex items-center justify-center">
                        <span class="h-5 w-5"><x-icon.solid icon="chevron-right" /></span>
                    </button>
                </div>


                <div class="grid grid-cols-7 gap-2">
                            <template x-for="day in weekDays" :key="`week-day.${day}`">
                                <span class="text-secondary-400 text-2xs text-center uppercase pointer-events-none"
                                      x-text="day"></span>
                            </template>

                            <template x-for="date in dates" :key="`week-date.${date.day}.${date.month}`">
                                <div class="flex justify-center picker-days">
                                    <button class="text-sm w-7 h-6 focus:outline-none rounded-md focus:ring-2 focus:ring-ofsset-2 focus:ring-primary-600
                                                 hover:bg-primary-100 dark:hover:bg-secondary-700 dark:focus:ring-secondary-400"
                                            :class="{
                                            'text-secondary-600 dark:text-secondary-400': date.month === month && !isSelected(date),
                                            'text-secondary-400 dark:text-secondary-600': date.month !== month,
                                            'text-primary-600 border border-primary-600 dark:border-gray-400': date.isToday && !isSelected(date),
                                            'text-white bg-primary-600 font-semibold border border-primary-600': isSelected(date),
                                            'hover:bg-primary-600 dark:bg-secondary-700 dark:border-secondary-400': isSelected(date),
                                        }"
                                            x-on:click="selectDate(date)"
                                            x-text="date.day"
                                            type="button">
                                    </button>
                                </div>
                            </template>
                        </div>


            </div>
         
        </div>
    </div>



</div>

