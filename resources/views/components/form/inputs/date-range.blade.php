<x-form.label {{ $attributes }} />

<span wire:ignore  x-data="{ 
    from: @entangle($attributes->get('wire:model:from')).defer,
    to: @entangle($attributes->get('wire:model:to')).defer,
    wireToMaskedValue(str){

        const Year = this.clean((str.split('-'))[0]);
        const Month = this.clean((str.split('-'))[1]);
        const Day = this.clean((str.split('-'))[2].split('T')[0]);

        const Hour = this.clean((str.split('-'))[2].split('T')[1].split(':')[0]);
        const Minute = this.clean((str.split('-'))[2].split('T')[1].split(':')[1]);

        // console.log('wireToMaskedValue',{Year, Month, Day, Hour, Minute });
        const formatted = `${Day}  /  ${Month}  /  ${Year} ${Hour}:${Minute}`;
      
        return formatted
    },
    clean(str){
        return str.replace(/\s/g, '');
    },
    maskedToWireValue(str){
      
        const Year = this.clean((str.split('  /  ')[2].split(' '))[0].split(':')[0]);
        const Month = this.clean(str.split('  /  ')[1]);
        const Day = this.clean(str.split('  /  ')[0]);
        const Hour = this.clean(str.split('  /  ')[2].split(' ')[1].split(':')[0]);
        const Minute = this.clean(str.split('  /  ')[2].split(' ')[1].split(':')[1]);


        const formatted = `${Year}-${Month}-${Day}T${Hour}:${Minute}:00`;

        // console.log('maskedToWireValue',{Year, Month, Day, Hour, Minute });
        return formatted

    },
    onChange(){
        this.from =  this.maskedToWireValue($refs.from.value);
        this.to =  this.maskedToWireValue($refs.to.value);
    },
    mask(ref){
        IMask(ref, {  
            pattern: 'd  /  m  /  Y HH:MM',
            placeholderChar: '_',
            blocks:{
                HH: {
                    mask: IMask.MaskedRange,
                    from: 0,
                    to: 23
                },
                MM: {
                    mask: IMask.MaskedRange,
                    from: 0,
                    to: 59
                }
            },
            format:  (date,ls) => {
                const str = date.toISOString();
                console.log('format',str)
                console.log('fm',this.wireToMaskedValue(str))
                return this.wireToMaskedValue(str);
            },
            parse:  (str)=> { 
                const Year = this.clean((str.split('  /  ')[2].split(' '))[0].split(':')[0]);
                const Month = this.clean(str.split('  /  ')[1]);
                const Day = this.clean(str.split('  /  ')[0]);
                const Hour = this.clean(str.split('  /  ')[2].split(' ')[1].split(':')[0]);
                const Minute = this.clean(str.split('  /  ')[2].split(' ')[1].split(':')[1]);
                const formatted = new Date( Date.UTC(Year, Month-1, Day, Hour, Minute, 0));
                console.log('formatted',formatted)
                return formatted;
            },
 
            mask: Date,
                min: new Date(1901, 0, 1),
                max: new Date(2050, 0, 1),
                lazy: false, autofix: true }).on('accept', function(event) {
                    
            });

    }
 }" x-init="mask($refs.from); mask($refs.to);" {{ $attributes->only(['class','x-data','@click.away'])->class(['border-gray-300 focus-within:border-blue-400 focus-within:ring-blue-400'=> !$attributes->has('class') ])->merge(['class' => 'flex items-center justify-center relative border-2  bg-white outline-none focus-within:ring-2 focus-within:shadow-inner focus-within:ring-opacity-20 rounded transition-all ease-in-out duration-200 flex-1']) }}>
        <x-form.loading {{ $attributes }} />
        <x-form.prepend {{ $attributes }} />



  
            <input x-ref="from"  x-on:keyup="onChange" x-bind:value="wireToMaskedValue(from)" {{ $attributes->whereStartsWith('x-') }} {{ $attributes->only(['placeholder','autocomplete','autofocus']) }} id="{{ collect($attributes->only(['id','name','wire:model','label']))->first() }}"  class="outline-none bg-transparent px-3 p-2 w-full flex-1 text-center text-lg md:text-sm {{ $attributes->has('rtl') ? 'text-right' : '' }}" />
           
            <span class="flex items-center mx-1">
                <span class="h-4 w-4">
                    <x-icon.solid icon="arrow-sm-right"/>
                </span>
            </span>
            <input x-ref="to" x-on:keyup="onChange" x-bind:value="wireToMaskedValue(to)" {{ $attributes->whereStartsWith('x-') }} {{ $attributes->only(['placeholder','autocomplete','autofocus']) }} id="{{ collect($attributes->only(['id','name','wire:model','label']))->first() }}"  class="outline-none bg-transparent px-3 p-2 flex-1 w-full text-center text-lg md:text-sm {{ $attributes->has('rtl') ? 'text-right' : '' }}" />
           
        <x-form.append {{ $attributes }} />
    </span>
<x-form.inline-errors {{ $attributes }} />