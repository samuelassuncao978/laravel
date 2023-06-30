<x-form.label {{ $attributes }} />
<span wire:ignore  x-data="{ 
    value: @entangle($attributes->wire('model')).defer,
    wireToMaskedValue(str){
        const Ymd = str.split('-');
        return [Ymd[2],Ymd[1],Ymd[0]].join('  /  ');
    },
    maskedToWireValue(str){
        const Ymd = str.split('  /  ');
        return [Ymd[2],Ymd[1],Ymd[0]].join('-');
    },
    age(){
        const dmY = this.wireToMaskedValue(this.value).split('  /  ');
        var age = ((new Date()).getFullYear() - Number(dmY[2]) );
        var today = new Date();
        if (today.getMonth() < Number(dmY[1] ?? 0) || (today.getMonth() == Number(dmY[1]) && today.getDate() < Number(dmY[0] ?? 0))) {
            age--;
        }
        return age;
    },
    onChange(){
        this.value =  this.maskedToWireValue($refs.input.value);
    }
 }" x-init="this.input = IMask($refs.input, {  
    pattern: 'd  /  m  /  Y',
    placeholderChar: '_',
    format: function (date) {
     
        var day = date.getDate();
        var month = date.getMonth() + 1;
        var year = date.getFullYear();
        if (day < 10) day = '0' + day;
        if (month < 10) month = '0' + month;
        return [day,month,year].join('  /  ');
    },
    parse: function (str) { 
        var yearMonthDay = str.split('  /  ');
        return new Date(yearMonthDay[2], yearMonthDay[1] - 1, yearMonthDay[0]);
    },
    mask: Date,
        min: new Date(1901, 0, 1),
        max: new Date(2022, 0, 1),
        lazy: false, autofix: true }).on('accept', function(event) {});" {{ $attributes->only(['class','x-data','@click.away'])->class(['border-gray-300 focus-within:border-blue-400 focus-within:ring-blue-400'=> !$attributes->has('class') ])->merge(['class' => 'flex items-center justify-center relative border-2  bg-white outline-none focus-within:ring-2 focus-within:shadow-inner focus-within:ring-opacity-20 rounded transition-all ease-in-out duration-200 flex-1']) }}>
        <x-form.loading {{ $attributes }} />
        <x-form.prepend {{ $attributes }} />
  
            <input x-ref="input"  x-on:keyup="onChange" x-bind:value="wireToMaskedValue(value)" {{ $attributes->whereStartsWith('x-') }} {{ $attributes->only(['placeholder','autocomplete','autofocus']) }} id="{{ collect($attributes->only(['id','name','wire:model','label']))->first() }}"  class="outline-none bg-transparent px-3 p-2 w-3/5 flex-1 text-lg md:text-sm {{ $attributes->has('rtl') ? 'text-right' : '' }}" />
            <span x-show="age()"  class="block flex text-gray-500 items-center space-x-1 font-bold text-xs bg-gray-200 rounded p-1 px-2 mr-2">
                <span class="h-3.5 w-3.5"><x-icon.solid icon="cake" /></span>    
                <span x-text="age()"></span>
            </span>
        <x-form.append {{ $attributes }} />
    </span>
<x-form.inline-errors {{ $attributes }} />