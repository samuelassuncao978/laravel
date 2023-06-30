
<x-form.label {{ $attributes }} />
    <span wire:ignore  x-data="{
        default: '{{ $attributes->get('default') }}',
        value: @entangle($attributes->wire('model')),
        options: JSON.parse(atob('{{ base64_encode(json_encode($attributes->get('options'))) }}')),
        extendable: {!! $attributes->has('extendable') ? 'true' : 'false' !!},
        extended(){
            if(this.extendable){
                if(this.custom === null){
                    return !this?.options.find((item)=>item.id === (this.value ?? this.default));
                }
                return this.custom;
            }
            return false;
        },
        custom: null,
        onChange($event){
            const addition = ($event.target.value === '--add--' ? true : false);
            if(addition){
                $event.stopPropagation();
                this.custom = addition;
                this.$nextTick(() => {
                    this.$refs.custom_input.value = null;
                    this.$refs.custom_input.focus();
                    this.$refs.dropdown.selectedIndex = 0;
                });
            }else{
                this.value = $event.target.value
            }
        },
        selected(){
            return (this.value ?? this.default)
        }
     }" x-init="" {{ $attributes->only('class')->class(['border-gray-300 focus-within:border-blue-400 focus-within:ring-blue-400 bg-gradient-to-b from-white to-gray-200'=> !$attributes->has('class') ])->merge(['class' => 'flex items-center justify-center relative text-sm flex-grow border-2  bg-white outline-none focus-within:ring-2 focus-within:shadow-inner focus-within:ring-opacity-20 rounded transition-all ease-in-out duration-200']) }}>
      
      
        @if(isSet($prepend)) {{ $prepend }} @endif
       
     
            <select x-ref="dropdown" x-on:change="onChange" x-show="!extended()" class="px-4 p-2 appearance-none outline-none  block w-full bg-transparent text-gray-700 text-sm focus:bg-transparent bg-white ">
                <template x-for="item in options">
                    <option x-bind:value="item.id" x-bind:selected="selected() === item.id" x-text="item.text"></option>
                </template>   
                <option x-show="extendable" value="--add--" class="font-bold">--- ADD ---</option>
            </select>
            <svg x-show="!extended()"  xmlns="http://www.w3.org/2000/svg"
                class="h-3/6  top-1/2 transform -translate-y-1/2 right-1 absolute pointer-events-none text-gray-700"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
            </svg>



            <input x-show="extended()" x-ref="custom_input" x-model.debounce.500ms="value" id="{{ collect($attributes->only(['id','name','wire:model','label']))->first() }}" {{ $attributes->except(['name','class','wire:loading','wire:target','wire:model','loading','prepend','append','options']) }} class="outline-none bg-white w-full px-4 p-2 flex-1" />
      
            <span class="bg-white h-full flex items-center justify-center p-2" x-show="extended()">
                <svg  xmlns="http://www.w3.org/2000/svg" x-on:click="custom = false; value = null; "
                    class=" h-5 w-5 cursor-pointer text-gray-400 hover:text-gray-800"
                    viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                        clip-rule="evenodd" />
                </svg>

            </span>
         
        
        @if(isSet($append)) {{ $append }} @endif
        <x-form.privacy-barrier {{ $attributes }} />
    </span>
    
<x-form.inline-errors {{ $attributes }} />