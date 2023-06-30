
@aware(['template'])

<x-form.label {{ $attributes }} />
<div
x-init="!selected ? selected = [] : null"
x-data="{
    all: JSON.parse(atob('{{ base64_encode(json_encode($attributes->get('options')??[])) }}')),
    selected: @entangle($attributes->wire('model'))
}"


{{ $attributes->only(['class','x-data','@click.away'])->class(['border-gray-300 focus-within:border-blue-400 focus-within:ring-blue-400'=> !$attributes->has('class') ])->merge(['class' => 'flex h-60 overflow-hidden items-center justify-center relative text-sm border-2  bg-white outline-none focus-within:ring-2 focus-within:shadow-inner focus-within:ring-opacity-20 rounded transition-all ease-in-out duration-200 ']) }}>
    <div class="flex h-full flex-col flex-1 scrollbar space-y-2 p-4 pt-0">
        <div class="font-extralight flex items-center justify-between text-gray-300 uppercase text-xs px-2 sticky top-0 pt-2 z-10 bg-white bg-opacity-50  backdrop-filter backdrop-blur-sm">
            <span>Available</span>
            <!-- <button type="button" class="h-5 w-5 outline-none focus:ring-2 focus:ring-gray-700 bg-white hover:bg-gray-100 hover:text-blue-500 text-gray-400 flex items-center justify-center p-1 rounded-full">
                <x-icon.outline icon="search" />
            </button> -->
        </div>
        <template x-for="item in all.filter(({id})=>!(selected??[]).includes(id))">
            <button type="button" x-on:click="selected.push(item.id)" class="flex items-center outline-none text-left focus:bg-gray-700 focus:text-white p-2 bg-gray-50 relative rounded hover:bg-gray-100 hover:text-gray-700 select-none cursor-pointer">
                @if(isSet($template))
                    {{ $template }}
                @else
                    <span class="flex-grow" x-text="item.text"></span>
                @endif
            </button>
        </template>    
    </div>
    <div class="flex flex-col space-y-2 justify-center h-full flex-col w-px bg-gray-300">
        <button x-on:click="selected = all.map(({id})=>id)" type="button" class="h-5 w-5 outline-none focus:ring-2 focus:ring-gray-700 bg-white hover:bg-gray-100 hover:text-blue-500 text-gray-400 transform -translate-x-1/2 flex items-center justify-center p-0.5 rounded-full">
            <x-icon.solid icon="chevron-right" />
        </button>
        <button x-on:click="selected = []" type="button" class="h-5 w-5 outline-none focus:ring-2 focus:ring-gray-700 bg-white hover:bg-gray-100 hover:text-blue-500 text-gray-400 transform -translate-x-1/2 flex items-center justify-center p-0.5 rounded-full">
            <x-icon.solid icon="chevron-left" />
        </button>
    </div>
    <div class="flex h-full flex-col flex-1 scrollbar space-y-2 p-4 pt-0">
        <div class="font-extralight text-gray-300 uppercase text-xs px-2 sticky top-0 pt-2 z-10 bg-white bg-opacity-50  backdrop-filter backdrop-blur-sm">
            Selected
        </div>
        <template x-for="item in all.filter(({id})=>(selected??[]).includes(id))">
            <button type="button" x-on:click="selected = selected.filter((id)=>id!==item.id)" class="flex items-center text-left outline-none p-2 bg-gray-50 focus:bg-gray-700 focus:text-white relative rounded hover:bg-gray-100 hover:text-gray-700 select-none cursor-pointer">
            @if(isSet($template))
                {{ $template }}
            @else
                <span class="flex-grow" x-text="item.text"></span>
            @endif
            </button>
        </template>    
    </div>
</div>


